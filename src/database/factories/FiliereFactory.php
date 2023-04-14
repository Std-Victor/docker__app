<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Filiere>
 */


class FiliereFactory extends Factory
{
  protected $arr = ['resau', 'developpement', 'cloud', 'gestion'];
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $current = current($this->arr);
    return [
      'nom' => next($this->arr) !== $current ? $current : next($this->arr),
    ];
  }
}