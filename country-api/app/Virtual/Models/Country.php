<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Country",
 *     description="Modèle de pays",
 *     @OA\Xml(
 *         name="Country"
 *     )
 * )
 */
class Country
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID du pays",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *     title="Nom",
     *     description="Nom du pays",
     *     example="France"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="Capitale",
     *     description="Capitale du pays",
     *     example="Paris"
     * )
     *
     * @var string
     */
    private $capital;

    /**
     * @OA\Property(
     *     title="Population",
     *     description="Population du pays",
     *     example=67000000
     * )
     *
     * @var integer
     */
    private $population;

    /**
     * @OA\Property(
     *     title="Région",
     *     description="Région du pays",
     *     example="Europe"
     * )
     *
     * @var string
     */
    private $region;

    /**
     * @OA\Property(
     *     title="URL du drapeau",
     *     description="URL vers l'image du drapeau",
     *     example="http://localhost:8000/storage/flags/france.jpg"
     * )
     *
     * @var string
     */
    private $flag_url;

    /**
     * @OA\Property(
     *     title="Date de création",
     *     description="Date de création du pays",
     *     example="2023-01-01T00:00:00.000000Z",
     *     format="datetime"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Date de mise à jour",
     *     description="Date de dernière mise à jour du pays",
     *     example="2023-01-01T00:00:00.000000Z",
     *     format="datetime"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;
}