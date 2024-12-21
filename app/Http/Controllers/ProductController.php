<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
class ProductController extends Controller
{

    //
        public function login(Request $request)
        {
            // Validate the request data
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
            ]);
    
            // Check if username and password are 'guest'
            if ($request->username === 'guest' && $request->password === 'guest') {
                // Retrieve a dummy user (you can customize this logic)
                $user = User::where('email', 'julian51@example.com')->first(); 
    
                // Generate JWT token for the user
                $token = JWTAuth::fromUser($user); // This should now work as User implements JWTSubject
    
                return response()->json([
                    'message' => 'Successfully logged in',
                    'token' => $token
                ]);
            }
    
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    
    
    //

    

 
    public function index() {

        return Product::all();
        
        }
        
        public function store(Request $request) {
        
        $product = Product::create($request->all());
        
        return response()->json($product, 201);
        
        }
        
        public function show($id) {
        
        return Product::find($id);
        
        }
        public function update(Request $request, $id) {

            $product = Product::findOrFail($id);
            
            $product->update($request->all());
            
            return response()->json($product, 200);
            
            }
            
            public function destroy($id) {
            
            Product::destroy($id);
            
            return response()->json(null, 204);
            
            }

}
