<?php

namespace Database\Factories;

use App\Models\Projeto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class ProjetoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Projeto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $n = mt_rand(1, 100);
        $dt_inicio = Carbon::now()->copy()->subRealDays($n);
        $dt_fim = Carbon::now()->addRealDays($n);
        $riscos = [
            0 => 'baixo',
            1 => 'médio',
            2 => 'alto'
        ];
        $risco = $riscos[mt_rand(0, 2)];

        return [
            'nome' => $this->faker->company(),
            'dt_inicio' => $dt_inicio->format('Y-m-d'),
            'dt_fim' => $dt_fim->format('Y-m-d'),
            'valor' => $this->faker->randomFloat(2, 50000, 500000),
            'risco' => $risco
        ];
    }
}
