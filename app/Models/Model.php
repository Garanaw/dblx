<?php declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Jenssegers\Optimus\Optimus;

abstract class Model extends Eloquent
{
    /**
     * Allows models to be injected to controllers with an encoded ID
     *
     * @param $value
     * @param null $field
     * @return Eloquent|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        if (is_numeric($value)) {
            $value = app(Optimus::class)->decode((int)$value);
        }
        return parent::resolveRouteBinding($value, $field);
    }

    public function getRenderableId(): ?int
    {
        $id = $this->getKey();
        return $id
            ? app(Optimus::class)->encode((int)$id)
            : null;
    }
}
