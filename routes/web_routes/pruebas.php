<?php

    use Greenter\XMLSecLibs\Certificate\X509Certificate;
    use Greenter\XMLSecLibs\Certificate\X509ContentType;
    use Elibyy\TCPDF\Facades\TCPDF as  PdfSignature;

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


    });
