<?php
 
App::import('Vendor','xtcpdf');
 
$pdf = new XTCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
 
$pdf->AddPage();

var_dump($order);

$created = $order['Order']['created'];
$gift_wrap = ($order['Order']['gift_wrap'] == 1) ? 'Non' : 'Oui';
$total = 534564;
//$total = $order['Order']['price'];
switch ($order['Order']['status'])
{
	case 0:
		$status = '<span class="status-order label btn-black">En attente</span>';
		break;

	case 1:
		$status = '<span class="status-order label btn-blue">En cours</span>';
		break;
	
	case 2:
		$status = '<span class="status-order label btn-green">Expédiée</span>';
		break;
}

$html = '<div class="container">
	<div class="div">
		<div class="title">Détail de la commande : #' . $id . '</div>
		<div id="ctn-order-items">
			<div class="ctn-order-info">
				<span class="line">Commande effectuée le : ' . $created . '</span>
				<span class="line">Emballage cadeau : ' . $gift_wrap . '</span>
				<span class="line">
					Status :' . $status . '</span>
			</div><div id="ctn-order-title">
				<div id="title-order-article-name">Article commandés</div><!--
				--><div id="title-order-article-priceUnitaire">Prix unitaire</div><!--
				--><div id="title-order-article-priceTTC">Montant TTC</div>
			</div>';

foreach ($order as $key => $purchase)
{
	$html .='<div class="order-item">
			<div class="order-article-logo">
				<img src="/img/files/' . $purchase['Picture']['picture'] . '" alt="img article" />
			</div><!--
			--><div class="order-article-name"><span>' . $purchase['Purchase']['quantity'] . '</span> ' . $purchase['Product']['name'] . ' ' . $purchase['Article']['size'] . ' ' . $purchase['Article']['color'] . '</div><!--
			--><div class="order-article-priceUnitaire">' . $purchase['Product']['price'] . ' €</div><!--
			--><div class="order-article-priceTTC">' . $purchase['Purchase']['price'] . ' €</div>
		</div>';
}

$html .= '<div class="title order-total">Total de votre commande : <b>' . $total . '€ TTC</b></div>
		</div>
	</div>
</div>';
 
$pdf->writeHTML($html, true, false, true, false, '');
 
$pdf->lastPage();
 
echo $pdf->Output(APP . 'webroot' . DS . 'files' . DS . 'pdf' . DS . 'order' . $id . '.pdf', 'D');