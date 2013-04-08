<?phpnamespace workbench\calli\src\controllers\;

use Illuminate\Routing\Controllers\Controller;
use Illuminate\Support\Facades\View;

class MyPluginController extends BaseController {

	public function showContact()
	{
		Log::info("test");
		return View::make('contact');
	}
}