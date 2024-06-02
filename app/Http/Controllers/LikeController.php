namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_music' => 'required|exists:music,id',
            'add_date' => 'required|date',
        ]);

        $like = new Like();
        $like->id_user = $request->id_user;
        $like->id_music = $request->id_music;
        $like->add_date = $request->add_date;
        $like->save();

        return response()->json($like, 201);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'id_music' => 'required|exists:music,id',
        ]);

        $like = Like::where('id_user', $request->id_user)
            ->where('id_music', $request->id_music)
            ->first();

        if ($like) {
            $like->remove_date = now();
            $like->save();

            return response()->json($like, 200);
        }

        return response()->json(['message' => 'Like not found'], 404);
    }
}
