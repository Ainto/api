<?php
/**
 * This file is part of the Tmdb PHP API created by Michael Roterman.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package Tmdb
 * @author Michael Roterman <michael@wtfz.net>
 * @copyright (c) 2013, Michael Roterman
 * @version 0.0.1
 */
namespace Tmdb\Factory;

use Tmdb\Model\Collection\Genres;
use Tmdb\Model\Genre;

class GenreFactory extends AbstractFactory
{
    /**
     * {@inheritdoc}
     */
    public function create(array $data = array())
    {
        return $this->hydrate(new Genre(), $data);
    }

    /**
     * {@inheritdoc}
     */
    public function createCollection(array $data = array())
    {
        $collection = new Genres();

        foreach($data as $item) {
            $collection->add(null, $this->create($item));
        }

        return $collection;
    }
}
