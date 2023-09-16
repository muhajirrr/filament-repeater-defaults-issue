<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\CustomerType;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),

                Forms\Components\RichEditor::make('description')
                    ->required(),

                Forms\Components\Repeater::make('prices')
                    ->relationship()
                    ->deletable(false)
                    ->reorderable(false)
                    ->addable(false)
                    ->columns(2)
                    ->default(
                        CustomerType::all()->map(fn (CustomerType $customerType) => [
                            'customer_type_id' => $customerType->id,
                            'price' => 0,
                        ])->toArray()
                    )
                    ->schema([
                        Forms\Components\Select::make('customer_type_id')
                            ->relationship('customerType', 'name')
                            ->searchable()
                            ->preload()
                            ->disabled()
                            ->required(),

                        Forms\Components\TextInput::make('price')
                            ->numeric()
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
