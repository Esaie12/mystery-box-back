@extends('emails.template_email')
@section('content')
<div class="content">
                        
                        <p class="greeting">Bonjour {{$order->user->name}},</p>
                        
                        <p class="message">
                            Merci pour votre confiance ! Votre commande a bien été reçue et <span class="highlight">le paiement a été confirmé</span>. 
                            Notre équipe prépare déjà votre boîte mystère avec soin. ✨
                        </p>
                        
                        <!-- Order Box -->
                        <div class="order-box">
                            <p class="order-number">#{{$order->reference}}</p>
                            <p class="order-date">Commande passée le {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</p>
                        </div>
                        
                        <!-- Order Details -->
                        <div class="info-row">
                            <p class="info-label">Catégorie choisie</p>
                            <p class="info-value">{{$order->category->icon}} {{$order->category->title}}</p>
                        </div>
                        
                        <div class="info-row">
                            <p class="info-label">Destinataire</p>
                            <p class="info-value">{{$order->recipient_name}}</p>
                            <p class="info-value">{{$order->phone}}</p>
                        </div>
                        
                        <div class="info-row">
                            <p class="info-label">Adresse de livraison</p>
                            <p class="info-value">{{$order->address}}</p>
                        </div>

                        
                        
                        <div class="info-row">
                            <p class="info-label">Date de livraison prévue</p>
                            <p class="info-value">{{ \Carbon\Carbon::parse($order->delivery_date)->format('d/m/Y') }}</p>
                        </div>

                        @if($order->delivery_instructions)
                        <div class="info-row">
                            <p class="info-label">Instruction à la livraison</p>
                            <p class="info-value">{{$order->delivery_instructions}}</p>
                        </div>
                        @endif
                        
                        <div class="info-row">
                            <p class="info-label">Montant</p>
                            <p class="info-value">{{$order->amount}} FCFA</p>
                        </div>
                        
                        <!-- CTA Button -->
                        <center>
                            <a href="https://mystery-kdo.com/suivre-commande?id=MLB-2026-001234" class="button">
                                📦 Suivre ma commande
                            </a>
                        </center>
                        
                        <div class="divider"></div>
                        
                        <!-- Next Steps -->
                        <p class="message" style="margin-bottom: 10px;">
                            <strong>Prochaines étapes :</strong>
                        </p>
                        <p class="message">
                            ✓ Votre commande est confirmée<br>
                            ⚙️ Préparation en cours (24-48h)<br>
                            📦 Expédition et livraison<br>
                            💝 Réception pour le 14 février
                        </p>
                        
                        <p class="message">
                            Vous recevrez un email à chaque étape importante. En attendant, gardez le mystère ! 🤫
                        </p>
                        
                    </div>

@endsection