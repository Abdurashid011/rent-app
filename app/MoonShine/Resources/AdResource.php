<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Enums\Gender;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ad;

use MoonShine\Fields\Enum;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Ad>
 */
class AdResource extends ModelResource
{
    protected string $model = Ad::class;

    protected string $title = "E'lonlar";

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make("Sarlavha", 'title'),
                Text::make("Ta'rif", 'desctription'),
                Number::make("Narxi", 'price'),
                Number::make("Xonalar", 'rooms'),
                Text::make("Manzil", 'address'),
                Enum::make("Jinsi", 'gender')->attach(Gender::class),
                BelongsTo::make(label: 'Filial', relationName: 'branch', resource: new BranchResource),
            ]),
        ];
    }

    /**
     * @param Ad $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
