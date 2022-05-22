<?php

    use Greenter\XMLSecLibs\Certificate\X509Certificate;
    use Greenter\XMLSecLibs\Certificate\X509ContentType;
    use Elibyy\TCPDF\Facades\TCPDF as  PdfSignature;
    use App\Models\Empleado;
    use Carbon\Carbon;

    Route::prefix('pruebas')->middleware('auth')->group(function () {

        Route::get('tipo_certificados',function(){

            //Registro Tipo de Certificado
            TipoCertificado::create(
                [
                'nombre'=>'Persona Natural',
                'descripcion'=>'Certificado para persona Natural con DNI'
                ]
            );

            TipoCertificado::create(
                [
                    'nombre'=>'Persona Juridica',
                    'descripcion'=>'Certificado para Responsable de Persona Juridica'
                ]
            );



        });

        Route::get('certificados',function(){

            //Generación de .pem
            $certificado = DB::table('certificados')->where('id',23)->first();
            $pfx         = $certificado->pfx;
            $password    = $certificado->password;


           $certificate = new X509Certificate($pfx, $password);
            $pem = $certificate->export(X509ContentType::PEM);
            
            //Generación del Certificado
            // set additional information in the signature
            $info = array(
                'Name' => 'TCPDF',
                'Location' => 'Office',
                'Reason' => 'Testing TCPDF',
                'ContactInfo' => 'http://www.tcpdf.org',
            );

            // set document signature
            PDF::setSignature($pem, $pem, 'tcpdfdemo', '', 2, $info);
            
            PDF::SetFont('helvetica', '', 12);
            PDF::SetTitle('Pdf Firmado Digitalmente');
            PDF::AddPage();

            // print a line of text
            $text = view('test');

            // add view content
            PDF::writeHTML($text, true, 0, true, 0);

            // add image for signature
            //PDF::Image('tcpdf.png', 180, 60, 15, 15, 'PNG');
            
            // define active area for signature appearance
            PDF::setSignatureAppearance(180, 60, 15, 15);
            
            // save pdf file
            PDF::Output(public_path('hello_world_prueba.pdf'), 'F');

            PDF::reset();

            dd('pdf created');


        });


        Route::get('guzzle',function(){

            #Paso 1: Leer el JSON externo mediante Guzzle
            $client   = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'https://gyrocode.github.io/files/jquery-datatables/arrays_id.json');

            #Paso 2 : Convertir el Json externo en un array php
            $array    = json_decode($response->getbody());
            $data     = $array->data;

            #Paso 3: Generar un ciclo de inserción
            foreach ($data as $key => $value) {
                $id = $value[0];
                $name = $value[1];
                $position = $value[2];
                $office = $value[3];
                $extn = $value[4];
                $start_date = Carbon::parse( $value[5] )->format('Y-m-d');
                $salary =  str_replace(['$',','], ['',''], $value[6]);

                Empleado::updateOrCreate([
                    'id'=>$id
                ],[
                    'name'=>$name,
                    'position'=>$position,
                    'office'=>$office,
                    'extn'=>$extn,
                    'start_date'=>$start_date,
                    'salary'=>$salary
                ]);
            }


        });

        Route::get('certificado_pdf',function(){

            return view('pdf.certificado_trabajo');
        });


    });
