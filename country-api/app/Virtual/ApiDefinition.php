<?php

namespace App\Virtual;

/**
 * @OA\Info(
 *     title="API de Pays",
 *     version="1.0.0",
 *     description="API pour la gestion des informations sur les pays",
 *     @OA\Contact(
 *         email="contact@example.com",
 *         name="Support API"
 *     ),
 *     @OA\License(
 *         name="MIT",
 *         url="https://opensource.org/licenses/MIT"
 *     )
 * )
 * 
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="Serveur API"
 * )
 * 
 * @OA\SecurityScheme(
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="bearerAuth"
 * )
 * 
 * @OA\Tag(
 *     name="Authentification",
 *     description="Opérations d'authentification"
 * )
 * 
 * @OA\Tag(
 *     name="Pays",
 *     description="Opérations sur les pays"
 * )
 */
class ApiDefinition
{
}