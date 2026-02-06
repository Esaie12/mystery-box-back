<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de commande - Mystery Love Box</title>
    <style>
        /* Reset styles */
        body, table, td, a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        table, td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        img {
            -ms-interpolation-mode: bicubic;
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }
        body {
            margin: 0;
            padding: 0;
            width: 100% !important;
            height: 100% !important;
            background-color: #f4f4f4;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }
        
        /* Main styles */
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
        }
        
        .header {
            background: linear-gradient(135deg, #8B1538 0%, #C41E3A 100%);
            padding: 40px 30px;
            text-align: center;
        }
        
        .header h1 {
            color: #ffffff;
            font-size: 28px;
            margin: 0;
            font-weight: 600;
        }
        
        .header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            margin: 10px 0 0 0;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        
        .icon {
            font-size: 48px;
            margin-bottom: 20px;
        }
        
        .content {
            padding: 40px 30px;
        }
        
        .greeting {
            font-size: 18px;
            color: #333333;
            margin: 0 0 20px 0;
        }
        
        .message {
            font-size: 16px;
            line-height: 1.6;
            color: #666666;
            margin: 0 0 30px 0;
        }
        
        .order-box {
            background-color: #f9f9f9;
            border-left: 4px solid #C41E3A;
            padding: 20px;
            margin: 30px 0;
        }
        
        .order-number {
            font-size: 24px;
            font-weight: 700;
            color: #C41E3A;
            margin: 0 0 10px 0;
        }
        
        .order-date {
            font-size: 14px;
            color: #999999;
            margin: 0;
        }
        
        .info-row {
            padding: 15px 0;
            border-bottom: 1px solid #eeeeee;
        }
        
        .info-row:last-child {
            border-bottom: none;
        }
        
        .info-label {
            font-size: 12px;
            color: #999999;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0 0 5px 0;
        }
        
        .info-value {
            font-size: 16px;
            color: #333333;
            margin: 0;
            font-weight: 500;
        }
        
        .button {
            display: inline-block;
            padding: 16px 40px;
            background: linear-gradient(135deg, #C41E3A 0%, #8B1538 100%);
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            text-align: center;
            margin: 20px 0;
        }
        
        .button:hover {
            opacity: 0.9;
        }
        
        .divider {
            height: 1px;
            background-color: #eeeeee;
            margin: 30px 0;
        }
        
        .footer {
            background-color: #f9f9f9;
            padding: 30px;
            text-align: center;
        }
        
        .footer p {
            font-size: 14px;
            color: #999999;
            margin: 5px 0;
            line-height: 1.6;
        }
        
        .footer a {
            color: #C41E3A;
            text-decoration: none;
        }
        
        .social-links {
            margin: 20px 0;
        }
        
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #999999;
            text-decoration: none;
            font-size: 24px;
        }
        
        .highlight {
            background-color: #fff8dc;
            padding: 2px 6px;
            border-radius: 3px;
        }
        
        /* Responsive */
        @media screen and (max-width: 600px) {
            .email-container {
                width: 100% !important;
                margin: 0 !important;
            }
            .content {
                padding: 30px 20px !important;
            }
            .header {
                padding: 30px 20px !important;
            }
        }
    </style>
</head>
<body>
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
        <tr>
            <td>
                <!-- Email Container -->
                <div class="email-container">
                    
                    <!-- Header -->
                    <div class="header">
                        <div class="icon">🎁</div>
                        <h1>Mystery Love Box</h1>
                        <p>L'art de la surprise</p>
                    </div>
                    
                    <!-- Content -->
                    @yield('content')
                    
                    <!-- Footer -->
                    <div class="footer">
                        <p><strong>Des questions ?</strong></p>
                        <p>
                            Contactez-nous : <a href="mailto:contact@mystery-kdo.com">contact@mystery-kdo.com</a><br>
                            Ou visitez notre <a href="https://mystery-kdo.com/contact">page d'aide</a>
                        </p>
                        
                        <div class="social-links">
                            <a href="#">📘</a>
                            <a href="#">📷</a>
                            <a href="#">🐦</a>
                        </div>
                        
                        <div class="divider"></div>
                        
                        <p style="font-size: 12px; color: #bbbbbb;">
                            Mystery Love Box<br>
                            123 Rue de l'Amour, 75001 Paris<br>
                            © 2026 Tous droits réservés
                        </p>
                        
                        <p style="font-size: 11px; color: #cccccc; margin-top: 20px;">
                            Vous recevez cet email car vous avez passé une commande sur mystery-kdo.com
                        </p>
                    </div>
                    
                </div>
            </td>
        </tr>
    </table>
</body>
</html>