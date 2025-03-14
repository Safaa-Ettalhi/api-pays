<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="User",
 *     description="Modèle d'utilisateur",
 *     @OA\Xml(
 *         name="User"
 *     )
 * )
 */
class User
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID de l'utilisateur",
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
     *     description="Nom de l'utilisateur",
     *     example="John Doe"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="Email",
     *     description="Adresse email de l'utilisateur",
     *     format="email",
     *     example="john@example.com"
     * )
     *
     * @var string
     */
    private $email;

    /**
     * @OA\Property(
     *     title="Date de vérification de l'email",
     *     description="Date à laquelle l'email a été vérifié",
     *     example="2023-01-01T00:00:00.000000Z",
     *     format="datetime",
     *     nullable=true
     * )
     *
     * @var \DateTime
     */
    private $email_verified_at;

    /**
     * @OA\Property(
     *     title="Date de création",
     *     description="Date de création de l'utilisateur",
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
     *     description="Date de dernière mise à jour de l'utilisateur",
     *     example="2023-01-01T00:00:00.000000Z",
     *     format="datetime"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;
}