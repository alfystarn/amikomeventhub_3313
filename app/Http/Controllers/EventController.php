use App\Models\Event;
use App\Models\Category;
use App\Models\Partner;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    $categories = Category::all();
    $partners = Partner::all(); // Mengambil data partner agar tidak kosong

    // Ambil query filter dari URL string (?category=slug)
    $query = Event::with('category');

    if ($request->has('category') && $request->category != '') {
        $query->whereHas('category', function($q) use ($request) {
            $q->where('slug', $request->category);
        });
    }

    // Mengambil semua data yang lolos filter tanpa dibatasi take(2)
    $events = $query->get(); 

    return view('welcome', compact('categories', 'events', 'partners'));
});