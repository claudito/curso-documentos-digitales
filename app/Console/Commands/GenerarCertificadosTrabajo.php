<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Empleado;
use App\Models\Certificado;
use Greenter\XMLSecLibs\Certificate\X509Certificate;
use Greenter\XMLSecLibs\Certificate\X509ContentType;
use Elibyy\TCPDF\Facades\TCPDF as  PdfSignature;
use Carbon\Carbon;

class GenerarCertificadosTrabajo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'documentos:generar_certificados_trabajo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generación de Certificado de Trabajo';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
            $empleados = Empleado::limit(5)->get();
            
            //Generación de .pem
            $certificado = Certificado::where('id',23)->first();
            $pfx         = $certificado->pfx;
            $password    = $certificado->password;
            $nombre_comun = $certificado->nombre_comun;
            $cargo        = $certificado->cargo;

            $certificate = new X509Certificate($pfx, $password);
            $pem = $certificate->export(X509ContentType::PEM);
            
            foreach ($empleados as $key => $value) {
                // set additional information in the signature
                $info = array(
                    'Name' => 'TCPDF',
                    'Location' => $value->office,
                    'Reason' => $value->id.'-'.$value->name,
                    'ContactInfo' => 'http://www.tcpdf.org',
                );

                // set document signature
                PdfSignature::setSignature($pem, $pem, 'tcpdfdemo', '', 2, $info);
                
                PdfSignature::SetFont('helvetica', '', 12);
                PdfSignature::SetTitle('Pdf Firmado Digitalmente');
                PdfSignature::AddPage();

                // print a line of text
                $mes  = $this->mes(date('m'));
                $text = view('pdf.certificado_trabajo',compact('value','mes','nombre_comun','cargo'));

                // add view content
                PdfSignature::writeHTML($text, true, 0, true, 0);

                // add image for signature
                //PDF::Image('tcpdf.png', 180, 60, 15, 15, 'PNG');
                
                // define active area for signature appearance
                PdfSignature::setSignatureAppearance(180, 60, 15, 15);
                
                // save pdf file
                PdfSignature::Output(public_path('certificados/'.$value->id.'-'.$value->name.'.pdf'), 'F');

                PdfSignature::reset();
                dump('Documento Generado: '.$value->id.'- '.$value->name);
            }
    }


    private function mes($mes){
        $data = [
            '01'=>'Enero',
            '02'=>'Febrero',
            '03'=>'Marzo',
            '04'=>'Abril',
            '05'=>'Mayo',
            '06'=>'Junio',
            '07'=>'Julio',
            '08'=>'Agosto',
            '09'=>'Setiembre',
            '10'=>'Octubre',
            '11'=>'Noviembre',
            '12'=>'Diciembre',
        ];
        return $data[$mes];
    }

}
