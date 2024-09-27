<?php

namespace Joespace\Core\Filament;

use Filament\Resources\Resource;
use Illuminate\Support\Str;
use ReflectionClass;


abstract class BaseResource extends Resource
{

//   abstract protected static ?string $model = Customer::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


//    public static function form(Form $form): Form
//    {
//        return $form
//            ->schema([
//                //
//            ]);
//    }

//    public static function table(Table $table): Table
//    {
//        return $table
//            ->columns([
//                //
//            ])
//            ->filters([
//                //
//            ])
//            ->actions([
//                Tables\Actions\EditAction::make(),
//            ])
//            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
//            ]);
//    }
//
//    public static function getRelations(): array
//    {
//        return [
//            //
//        ];
//    }
//
    public static function getPages(): array
    {
        return array_merge(parent::getPages(), self::DefaultPages());
    }

    protected static function DefaultPages(): array
    {
        $r = new      ReflectionClass(static::class);
        $singularResource = Str::plural(Str::replace("Resource", "", $r->getShortName()));
        $resource = Str::singular(Str::replace("Resource", "", $r->getShortName()));

        $base = $r->getNamespaceName() . "\\" . $r->getShortName() . "\\Pages";


        $list = $base . "\\List" . $singularResource;
        $create = $base . "\\Create" . $resource;
        $edit = $base . "\\Edit" . $resource;

        return [
            'index' => $list::route('/'),
            'create' => $create::route('/create'),
            'edit' => $edit::route('/{record}/edit'),
        ];
    }
}
