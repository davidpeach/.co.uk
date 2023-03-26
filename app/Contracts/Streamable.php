<?php

declare(strict_types=1);

namespace App\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphOne;

interface Streamable
{
    public function meta(): MorphOne;
}
