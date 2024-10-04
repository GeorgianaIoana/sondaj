<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Models\Appointment;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-s-pencil-square';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('date')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name') 
                    ->required(),
                Forms\Components\Toggle::make('status')
                    ->required()
                    ->default('pending'),
                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->dateTime()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            ])
            ->modifyQueryUsing(function (Builder $query) {

                /** @var User */
                $authUser = Auth::user();

                if ($authUser->role == 'admin') {
                    return $query;
                }

                if ($authUser->role == 'user') {
                    return $query->where('user_id', $authUser->id);
                }
            });
    }
  
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return true;  // Ensure this returns true for visibility
    }

}
