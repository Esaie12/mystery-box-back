@extends('emails.template_email')
@section('content')
<style>
    /* Benefits */
        .benefits {
            margin: 30px 0;
        }
        
        .benefit-item {
            display: flex;
            align-items: flex-start;
            margin: 15px 0;
        }
        
        .benefit-icon {
            font-size: 24px;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .benefit-text {
            font-size: 15px;
            color: #666666;
            line-height: 1.6;
            margin: 0;
        }
</style>
<div class="content">
                        
                        <p class="welcome-message">
                            Bienvenue {{$user->name}} ! 💕
                        </p>
                        
                        <p class="intro">
                            Nous sommes ravis de vous accueillir dans la famille Mystery Kdo !<br>
                            Préparez-vous à faire vibrer les cœurs...
                        </p>
                        
                        <p class="message">
                            Chez Mystery Kdo, nous croyons que les meilleures surprises sont celles qui viennent du cœur. 
                            C'est pourquoi chacune de nos box est soigneusement composée pour créer des moments magiques et inoubliables. ✨
                        </p>
                        
                        <!--div class="promo-box">
                            <div class="promo-emoji">🎉</div>
                            <p class="promo-text"><strong>Cadeau de bienvenue exclusif !</strong></p>
                            <p class="promo-code">BIENVENUE15</p>
                            <p class="promo-text">
                                <strong>15% de réduction</strong> sur votre première commande<br>
                                <em>Valable 7 jours</em>
                            </p>
                        </div-->
                        
                        
                        <!-- Benefits -->
                        <h2 style="text-align: center; color: #333333; font-size: 24px; margin: 30px 0 20px 0;">
                            Pourquoi Mystery Kdo ?
                        </h2>
                        
                        <div class="benefits">
                            <div class="benefit-item">
                                <div class="benefit-icon">📦</div>
                                <p class="benefit-text">
                                    <strong>Mystère garanti</strong><br>
                                    Chaque box est unique et soigneusement préparée pour surprendre
                                </p>
                            </div>
                            
                            <div class="benefit-item">
                                <div class="benefit-icon">🚚</div>
                                <p class="benefit-text">
                                    <strong>Livraison rapide</strong><br>
                                    Expédition sous 24-48h, livraison garantie pour la Saint-Valentin
                                </p>
                            </div>
                            
                            <div class="benefit-item">
                                <div class="benefit-icon">💝</div>
                                <p class="benefit-text">
                                    <strong>Qualité premium</strong><br>
                                    Des produits sélectionnés avec soin pour créer l'émotion parfaite
                                </p>
                            </div>
                            
                            <div class="benefit-item">
                                <div class="benefit-icon">🎨</div>
                                <p class="benefit-text">
                                    <strong>Emballage raffiné</strong><br>
                                    Une présentation élégante qui ajoute de la magie au déballage
                                </p>
                            </div>
                            
                            <div class="benefit-item">
                                <div class="benefit-icon">💌</div>
                                <p class="benefit-text">
                                    <strong>Message personnalisé</strong><br>
                                    Ajoutez une touche personnelle avec un message manuscrit
                                </p>
                            </div>
                        </div>
                        
                        <!-- CTA Button -->
                        <center>
                            <a href="https://mystery-kdo.com/categories" class="button">
                                🛍️ Découvrir nos Categories
                            </a>
                        </center>
                        
                        <div class="divider"></div>
                        
                        <p class="message">
                            La Saint-Valentin approche à grands pas ! 💘 N'attendez pas pour réserver votre Mystery Kdo 
                            et créer un moment magique que votre moitié n'oubliera jamais.
                        </p>
                        
                        <p class="message">
                            Si vous avez la moindre question, notre équipe est à votre écoute. 
                            Nous sommes là pour vous aider à créer la surprise parfaite !
                        </p>
                        
                        <p class="signature">
                            Avec tout notre amour,<br>
                            L'équipe Mystery kdo💕
                        </p>
                        
                    </div>
@endsection

@section('footer_msg')
 Vous recevez cet email car vous vous êtes inscrit(e) sur mystery-kdo.com
 @endsection