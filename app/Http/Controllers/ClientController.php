<?php


namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Service;
use App\Models\Contact;
use App\Models\Phone;
use App\Models\Reference;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_name_ar' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'company_name_ar' => 'nullable|string|max:255',
            'mission' => 'nullable|string',
            'mission_ar' => 'nullable|string',
            'vision' => 'nullable|string',
            'vision_ar' => 'nullable|string',
            'about_us' => 'nullable|string',
            'about_us_ar' => 'nullable|string',
            'additional_info' => 'nullable|string',
            'services' => 'nullable|array',
            'services.*.service_name' => 'required_with:services|string|max:255',
            'services.*.service_name_ar' => 'nullable|string|max:255',
            'services.*.description' => 'nullable|string',
            'services.*.description_ar' => 'nullable|string',
            'contacts' => 'nullable|array',
            'contacts.*.email' => 'nullable|email|max:255',
            'contacts.*.whatsapp' => 'nullable|string|max:20',
            'contacts.*.phones' => 'nullable|array',
            'contacts.*.phones.*.phone_number' => 'required_with:contacts|string|max:20',
            'references' => 'nullable|array',
            'references.*.reference_detail' => 'nullable|string',

        ]);

        // Create a new Client
        $client = Client::create([
            'client_name' => $request->client_name,
            'client_name_ar' => $request->client_name_ar,
            'company_name' => $request->company_name,
            'company_name_ar' => $request->company_name_ar,
            'mission' => $request->mission,
            'mission_ar' => $request->mission_ar,
            'vision' => $request->vision,
            'vision_ar' => $request->vision_ar,
            'about_us' => $request->about_us,
            'about_us_ar' => $request->about_us_ar,
            'additional_info' => $request->additional_info
        ]);

        // Create Services if provided
        if ($request->has('services')) {
            foreach ($request->services as $service) {
                $client->services()->create([
                    'service_name' => $service['service_name'],
                    'service_name_ar' => $service['service_name_ar'],
                    'description' => $service['description'],
                    'description_ar' => $service['description_ar'],
                ]);
            }
        }

        // Create Contacts if provided
        if ($request->has('contacts')) {
            foreach ($request->contacts as $contactData) {
                $contact = $client->contacts()->create([
                    'email' => $contactData['email'],
                    'whatsapp' => $contactData['whatsapp'],
                ]);

                // Create Phones if provided
                if (isset($contactData['phones'])) {
                    foreach ($contactData['phones'] as $phoneData) {
                        $contact->phones()->create([
                            'phone_number' => $phoneData['phone_number'],
                        ]);
                    }
                }
            }
        }


        if ($request->has('references')) {
            foreach ($request->references as $referenceData) {
                $client->references()->create([
                    'reference_detail' => $referenceData['reference_detail'],

                ]);
            }
        }

        // Return a response
        // return response()->json([
        //     'message' => 'Client and related data successfully created.',
        //     'client' => $client->load('services', 'contacts.phones', 'references')
        // ], 201);



        return view('show', [
            'message' => 'Client and related data successfully created.',
            'client' => $client->load('services', 'contacts.phones', 'references')
        ]);
    }






    public function index()
    {
        // Retrieve all clients with related data
        $clients = Client::with([
            'services',
            'contacts.phones',
            'references'
        ])->get();

        // Return the clients data with related information
        return response()->json($clients, 200);
    }
}
