<x-user-layout>

@push('styles')
<style>

body{
background:#f6f8fb;
font-family:'DM Sans',sans-serif;
}

/* container */

.checkout-wrapper{
max-width:1200px;
margin:auto;
padding:40px 20px;
}

/* breadcrumb */

.breadcrumb{
font-size:14px;
color:#94a3b8;
margin-bottom:20px;
}

.breadcrumb span{
color:#0f172a;
}

/* stepper */

.stepper{
display:flex;
align-items:center;
gap:20px;
margin-bottom:25px;
}

.step{
width:36px;
height:36px;
border-radius:50%;
display:flex;
align-items:center;
justify-content:center;
font-weight:600;
background:#e2e8f0;
color:#64748b;
}

.step.active{
background:#14b8a6;
color:white;
}

.step.done{
background:#d1fae5;
color:#14b8a6;
}

/* title */

.step-label{
color:#14b8a6;
font-weight:600;
font-size:13px;
letter-spacing:.05em;
margin-bottom:10px;
}

.page-title{
font-size:38px;
font-weight:700;
margin-bottom:8px;
}

.subtitle{
color:#64748b;
margin-bottom:30px;
}

/* grid */

.checkout-grid{
display:grid;
grid-template-columns:2fr 1fr;
gap:40px;
}

/* cards */

.card{
background:white;
border-radius:18px;
padding:28px;
margin-bottom:24px;
}

/* section header */

.section-title{
display:flex;
align-items:center;
gap:12px;
font-weight:600;
margin-bottom:18px;
}

.section-badge{
width:28px;
height:28px;
border-radius:50%;
background:#d1fae5;
display:flex;
align-items:center;
justify-content:center;
font-size:14px;
color:#14b8a6;
}

/* form */

.form-grid{
display:grid;
grid-template-columns:1fr 1fr;
gap:18px;
}

.form-group{
display:flex;
flex-direction:column;
}

.form-group label{
font-weight:500;
margin-bottom:6px;
}

input,
select,
textarea{

border:1px solid #e2e8f0;
border-radius:10px;
padding:12px;
font-size:14px;

}

/* textarea counter */

.counter{
font-size:12px;
color:#94a3b8;
margin-top:6px;
}

/* summary */

.summary{
background:white;
border-radius:18px;
padding:28px;
position:sticky;
top:110px;
height:fit-content;
}

/* premium box */

.premium-box{

background:#ecfdf5;
border:1px solid #a7f3d0;
border-radius:14px;
padding:18px;
margin-bottom:20px;

}

/* rows */

.summary-row{
display:flex;
justify-content:space-between;
margin-bottom:12px;
font-size:14px;
}

.total-row{
display:flex;
justify-content:space-between;
font-size:18px;
font-weight:700;
margin-top:12px;
}

/* button */

.pay-btn{

width:100%;
background:#0f766e;
border:none;
color:white;
padding:16px;
border-radius:12px;
font-weight:600;
margin-top:18px;

}

/* ssl label */

.ssl{

font-size:13px;
color:#94a3b8;
text-align:center;
margin-top:12px;

}

/* features */

.features{

display:flex;
justify-content:space-between;
margin-top:20px;
font-size:13px;
color:#64748b;

}

/* responsive */

@media(max-width:900px){

.checkout-grid{
grid-template-columns:1fr;
}

.form-grid{
grid-template-columns:1fr;
}

}

</style>
@endpush


<div class="checkout-wrapper">

<!-- breadcrumb -->

<div class="breadcrumb">

<a href="{{ route('welcome') }}">Accueil</a> >
<a href="{{ route('category_by_occasion', ['slug' => 'noel']) }}">Noël 🎄</a> >
<span>Personnalisation</span>

</div>


<!-- stepper -->

<div class="stepper">

<div class="step done">✓</div>

<div class="step active">2</div>

<div class="step">3</div>

</div>


<div class="step-label">

ÉTAPE 2 SUR 3

</div>


<div class="page-title">

Personnalisez votre box

</div>


<div class="subtitle">

Renseignez les informations du destinataire et votre message.

</div>


<div class="checkout-grid">


<!-- LEFT -->

<div>


<!-- DESTINATAIRE -->

<div class="card">

<div class="section-title">

<div class="section-badge">1</div>

Informations du destinataire

</div>


<div class="form-grid">

<div class="form-group">

<label>Nom du destinataire *</label>

<input placeholder="Prénom Nom">

</div>


<div class="form-group">

<label>Sexe du destinataire *</label>

<select>

<option>Sélectionnez</option>

<option>Homme</option>

<option>Femme</option>

</select>

</div>

</div>

</div>


<!-- MESSAGE -->

<div class="card">

<div class="section-title">

<div class="section-badge">2</div>

Message & options

</div>


<div class="form-group">

<label>Message personnalisé</label>

<textarea rows="4"
placeholder="Écrivez votre message (facultatif)..."></textarea>

<div class="counter">

0/300 caractères

</div>

</div>


<br>


<label>

<input type="checkbox">

Envoi anonyme

</label>


</div>


<!-- LIVRAISON -->

<div class="card">

<div class="section-title">

<div class="section-badge">3</div>

Adresse de livraison

</div>


<div class="form-group">

<label>Téléphone *</label>

<input placeholder="+33 6 00 00 00 00">

</div>


<br>


<div class="form-group">

<label>Adresse complète *</label>

<input placeholder="Numéro, rue, appartement...">

</div>


<br>


<div class="form-grid">

<div class="form-group">

<label>Ville *</label>

<input placeholder="Paris">

</div>


<div class="form-group">

<label>Code postal *</label>

<input placeholder="75001">

</div>

</div>


<br>


<div class="form-group">

<label>Pays *</label>

<select>

<option>Sélectionnez</option>

<option>France</option>

</select>

</div>


</div>


</div>


<!-- RIGHT SUMMARY -->

<div class="summary">

<h3>Récapitulatif</h3>


<div class="premium-box">

🎄 Noël

<br>

Catégorie Premium


<div class="summary-row">

<span>Prix de la box</span>

<strong>59€</strong>

</div>


</div>


<div class="summary-row">

Destinataire

<span>—</span>

</div>


<div class="summary-row">

Sexe

<span>—</span>

</div>


<div class="summary-row">

Envoi anonyme

<span>Non</span>

</div>


<div class="summary-row">

Message

<span>—</span>

</div>


<hr>


<div class="summary-row">

Sous-total

<span>59€</span>

</div>


<div class="summary-row">

Livraison

<span style="color:#14b8a6">

Calculée à l'étape suivante

</span>

</div>


<div class="total-row">

Total estimé

59€

</div>


<button class="pay-btn">

Continuer vers le paiement 🔒

</button>


<div class="ssl">

🔒 Paiement sécurisé · SSL chiffré

</div>


<div class="features">

<span>🔒 Sécurisé</span>

<span>📦 Suivi offert</span>

<span>↩️ SAV réactif</span>

</div>


</div>


</div>


</div>


</x-user-layout>
