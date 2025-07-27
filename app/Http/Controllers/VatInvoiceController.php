namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;
use App\Models\VatInvoice; // <-- Renamed Model

class VatInvoiceController extends Controller
{
    public function index()
    {
        $invoices = VatInvoice::with('party')->orderBy('id', 'desc')->get();
        return view("vat-invoice.index", compact('invoices'));
    }

    public function addVatInvoice()
    {
        $data['parties'] = Party::where('party_type', 'Client')->orderBy('full_name')->get();
        $data['invoice_no'] = 'INV-' . now()->format('Ymd-His');
        return view('vat-invoice.add', $data);
    }

    public function createVatInvoice(Request $request)
    {
        $validatedData = $request->validate([
            'party_id' => 'required|exists:parties,id',
            'invoice_date' => 'required|date',
            'invoice_no' => 'required|string|max:255|unique:vat_invoices',
            'item_description' => 'required|string|max:1000',
            'total_amount' => 'required|numeric|min:0',
            'vat_rate' => 'nullable|numeric|min:0|max:100',
            'vat_amount' => 'nullable|numeric|min:0',
            'net_amount' => 'required|numeric|min:0',
            'declaration' => 'nullable|string',
        ]);

        $invoice = VatInvoice::create($validatedData);

        return redirect()->route('print-vat-invoice', ['id' => $invoice->id])->withStatus("Invoice created successfully");
    }

    public function print($id)
    {
        $data['invoice'] = VatInvoice::with('party')->findOrFail($id);
        return view("vat-invoice.print", $data);
    }

    public function destroy($id)
    {
        $invoice = VatInvoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('manage-vat-invoices')->withStatus("Invoice deleted successfully");
    }
}