<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Auth;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form

            ->schema([
                TextInput::make('user.name')
                    ->label('User Name')
                    ->required(),

                TextInput::make('pay_day')
                    ->label('Payment reccuring day')
                    ->max(30)
                    ->min(1)
                    ->required(),

                Toggle::make('paid')
                    ->label('Paid')
                    ->required(),

                FileUpload::make('invoice')
                    ->label('Invoice Upload')
                    ->required(),

                DatePicker::make('payment_date')
                    ->label('Payment Date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('pay_day')
                    ->label('Pay Day')
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('paid')
                    ->label('Paid')
                    ->sortable(),
                Tables\Columns\TextColumn::make('invoice')
                    ->label('Invoice')
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_date')
                    ->label('Payment Date')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
