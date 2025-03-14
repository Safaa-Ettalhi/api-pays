<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/countries",
     *     summary="Récupérer la liste de tous les pays",
     *     tags={"Pays"},
     *     @OA\Response(
     *         response=200,
     *         description="Liste des pays récupérée avec succès",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Country")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Non autorisé"
     *     ),
     *     security={{"bearerAuth": {}}}
     * )
     */
    public function index()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

    /**
     * @OA\Post(
     *     path="/countries",
     *     summary="Créer un nouveau pays",
     *     tags={"Pays"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"name", "capital", "population", "region"},
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     description="Nom du pays"
     *                 ),
     *                 @OA\Property(
     *                     property="capital",
     *                     type="string",
     *                     description="Capitale du pays"
     *                 ),
     *                 @OA\Property(
     *                     property="population",
     *                     type="integer",
     *                     description="Population du pays"
     *                 ),
     *                 @OA\Property(
     *                     property="region",
     *                     type="string",
     *                     description="Région du pays"
     *                 ),
     *                 @OA\Property(
     *                     property="flag",
     *                     type="file",
     *                     description="Drapeau du pays (image)"
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Pays créé avec succès",
     *         @OA\JsonContent(ref="#/components/schemas/Country")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Données invalides"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Non autorisé"
     *     ),
     *     security={{"bearerAuth": {}}}
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'capital' => 'required|string|max:255',
            'population' => 'required|integer',
            'region' => 'required|string|max:255',
            'flag' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $country = new Country($request->except('flag'));

        if ($request->hasFile('flag')) {
            $path = $request->file('flag')->store('flags', 'public');
            $country->flag_url = asset('storage/' . $path);
        }

        $country->save();

        return response()->json($country, 201);
    }

    /**
     * @OA\Get(
     *     path="/countries/{id}",
     *     summary="Récupérer les détails d'un pays spécifique",
     *     tags={"Pays"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID du pays",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Détails du pays récupérés avec succès",
     *         @OA\JsonContent(ref="#/components/schemas/Country")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pays non trouvé"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Non autorisé"
     *     ),
     *     security={{"bearerAuth": {}}}
     * )
     */
    public function show(Country $country)
    {
        return response()->json($country);
    }

/**
 * @OA\Post(
 *     path="/countries/{id}/update",
 *     summary="Mettre à jour un pays existant (alternative pour Swagger)",
 *     tags={"Pays"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID du pays",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="name",
 *                     type="string",
 *                     description="Nom du pays"
 *                 ),
 *                 @OA\Property(
 *                     property="capital",
 *                     type="string",
 *                     description="Capitale du pays"
 *                 ),
 *                 @OA\Property(
 *                     property="population",
 *                     type="integer",
 *                     description="Population du pays"
 *                 ),
 *                 @OA\Property(
 *                     property="region",
 *                     type="string",
 *                     description="Région du pays"
 *                 ),
 *                 @OA\Property(
 *                     property="flag",
 *                     type="file",
 *                     description="Drapeau du pays (image)"
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Pays mis à jour avec succès",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Pays mis à jour avec succès"),
 *             @OA\Property(property="country", type="object", ref="#/components/schemas/Country")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Données invalides"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Pays non trouvé"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Non autorisé"
 *     ),
 *     security={{"bearerAuth": {}}}
 * )
 */
    public function update(Request $request, Country $country)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'capital' => 'sometimes|required|string|max:255',
            'population' => 'sometimes|required|integer',
            'region' => 'sometimes|required|string|max:255',
            'flag' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $country->fill($request->except('flag'));

        if ($request->hasFile('flag')) {
            // Supprimer l'ancien drapeau s'il existe
            if ($country->flag_url) {
                $oldPath = str_replace(asset('storage/'), '', $country->flag_url);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('flag')->store('flags', 'public');
            $country->flag_url = asset('storage/' . $path);
        }

        $country->save();

        return response()->json($country);
    }

    /**
     * @OA\Delete(
     *     path="/countries/{id}",
     *     summary="Supprimer un pays",
     *     tags={"Pays"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID du pays",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Pays supprimé avec succès"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Pays non trouvé"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Non autorisé"
     *     ),
     *     security={{"bearerAuth": {}}}
     * )
     */
    public function destroy(Country $country)
    {
        if ($country->flag_url) {
            $path = str_replace(asset('storage/'), '', $country->flag_url);
            Storage::disk('public')->delete($path);
        }

        $country->delete();
        return response()->json(null, 204);
    }
}