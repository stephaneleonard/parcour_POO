<?php

define('TD', '</td>');

class Car
{
    private string $brand;
    private string $model;
    private string $color;
    private float $weight;
    private int $releaseDate;
    private int $miles;
    private string $licencePlate;
    private string $available;
    private string $category;
    private string $country;
    private string $usage;
    private int $age;

    public function __construct(string $brand, string $model, string $color, float $weight, int $releaseDate, int $miles, string $licencePlate)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
        $this->weight = $weight;
        $this->releaseDate = $releaseDate;
        $this->miles = $miles;
        $this->licencePlate = $licencePlate;
        $this->available = $brand == 'Audi' ? 'reserved' : 'free';
        $this->category = $weight >= 3.5 ? 'utilitary' : 'commercial';
        $startChars = substr($licencePlate, 0, 2);
        //calculate country
        if ($startChars == 'BE') {
            $this->country = 'Belgium';
        } else if ($startChars == 'FR') {
            $this->country = 'France';
        } else if ($startChars == 'DE') {
            $this->country = 'Germany';
        } else {
            $this->country = null;
        }

        $this->calculateUsage();

        $this->calculateAge();
    }

    /**
     * calculateUsage
     *
     * @return void
     */
    private function calculateUsage()
    {
        //calculate usage
        if ($this->miles > 200000) {
            $this->usage = 'high';
        } else if ($this->miles > 100000) {
            $this->usage = 'middle';
        } else {
            $this->usage = 'low';
        }
    }

    private function calculateAge()
    {
        $year = date('Y');
        $this->age = $year -$this->releaseDate;
    }

    /**
     * getModel
     *
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }
    /**
     * getBrand
     *
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * getColor
     *
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * getWeight
     *
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * gerReleaseDate
     *
     * @return int
     */
    public function gerReleaseDate(): int
    {
        return $this->releaseDate;
    }

    /**
     * getMiles
     *
     * @return int
     */
    public function getMiles(): int
    {
        return $this->miles;
    }

    /**
     * addMiles
     *
     * @param  mixed $addedMiles
     * @return void
     */
    public function addMiles(int $addedMiles)
    {
        $this->miles += $addedMiles;
        $this->calculateUsage();
    }

    /**
     * getLicencePlate
     *
     * @return string
     */
    public function getLicencePlate(): string
    {
        return $this->licencePlate;
    }

    /**
     * getAvailable
     *
     * @return string
     */
    public function getAvailable(): string
    {
        return $this->available;
    }

    /**
     * getCategory
     *
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }
    /**
     * getCountry
     *
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * getUsage
     *
     * @return string
     */
    public function getUsage(): string
    {
        return $this->usage;
    }

    /**
     * getAge
     *
     * @return string
     */
    public function getAge(): string
    {
        return $this->age;
    }


    public function rouler()
    {
        $this->addMiles(100000);
    }

    public function display()
    {
        echo '<table style="width:100%">
        <tr>
          <th>Brand</th>
          <th>Model</th>
          <th>Color</th>
          <th>miles</th>
          <th>country</th>
          <th>category</th>
          <th>age</th>
          <th>Available</th>
          <th>Usage</th>
        </tr>
        <tr>
        ';
        echo "<td>" . $this->getBrand() . TD;
        echo "<td>" . $this->getModel() . TD;
        echo "<td>" . $this->getColor() . TD;
        echo "<td>" . $this->getMiles() . TD;
        echo "<td>" . $this->getCountry() . TD;
        echo "<td>" . $this->getCategory() . TD;
        echo "<td>" . $this->getAge() . TD;
        echo "<td>" . $this->getAvailable() . TD;
        echo "<td>" . $this->getUsage() . TD;

        echo '
        </tr>
      </table>';
    }
}
