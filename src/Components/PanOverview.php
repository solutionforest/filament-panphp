<?php

namespace SolutionForest\FilamentPanphp\Components;

use Filament\Forms\Get;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Checkbox;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Actions\Action;
use Pan\PanConfiguration;

class PanOverview extends BaseWidget
{
    public function table(Table $table): Table
    {
        $PanAnalytics = new class extends Model {
            protected $table = 'pan_analytics';
        };
        $currentPanConfiguration = PanConfiguration::instance()->toArray();
        return $table->query(fn() => $PanAnalytics::query())
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('impressions')->sortable(),
                TextColumn::make('hovers')->sortable(),
                TextColumn::make('clicks')->sortable()
            ])
            ->headerActions([
                Action::make('Config')
                ->form([
                    Checkbox::make('unlimitedAnalytics')
                        ->inline()
                        ->live()
                        ->default($currentPanConfiguration['max_analytics'] >= PHP_INT_MAX)
                        ->hidden(fn (Get $get): bool => $currentPanConfiguration['max_analytics'] < PHP_INT_MAX),
                    TextInput::make('maxAnalytics')
                        ->numeric()
                        ->label('Max Analytics')
                        ->default($currentPanConfiguration['max_analytics'])
                        ->visible(fn (Get $get): bool => ! $get('unlimitedAnalytics')),
                    TagsInput::make('allowedAnalytics')
                        ->label('Allowed Analytics')
                        ->separator(',')
                        ->default($currentPanConfiguration['allowed_analytics'])
                ])->modalCancelAction(false)->modalSubmitAction(false)
                // ->action(function (array $data): void {
                //     $unlimitedAnalytics = $data['unlimitedAnalytics'] ?? false;
                //     $maxAnalytics = $data['maxAnalytics'] ?? 50;
                //     $allowedAnalytics = $data['allowedAnalytics'] ?? [];
                //     if($unlimitedAnalytics){
                //         PanConfiguration::unlimitedAnalytics();
                //     }else{
                //         PanConfiguration::maxAnalytics($maxAnalytics);
                //     }
                //     PanConfiguration::allowedAnalytics(explode(",", $allowedAnalytics ));
                // })
            ]);
    }
}
