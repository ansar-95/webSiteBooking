var arrLang = {
    'fr' : {
    'entreprise' : 'entreprise',
    'conteneur' : 'Les conteneur',
    'titre_pre' : 'THOLDI EST UNE SOCTIETE DE TRANSPORT DE FRET MARITIME',
    'carousel1': 'Le fret frigorifique',
    'carousel1txt' : 'Le fret frigorifique transporté à travers le monde concerne en grande partie la viande, les poissons, les produits laitiers, les fruits et légumes (dont 80% de bananes, agrumes et autres...).',
    'services': 'NOUS OFFRONS PLUSIEURS SERVICES A NOS CLIENTS',
    'services1' : 'Stockage et réparation de conteneurs frigorifiques',
    'services2': 'Transport de liquides en vrac non dangereux',
    'services3': 'Installation et mise à disposition de conteneurs maritimes sur les aires de stockage',
    'port1': 'Port de Gennnevilliers (FR)',
    'port2': 'Port de Havre (FR)',
    'port3': 'Port de Marseille (FR)',
    'port4': 'Port de Hambourg (DE)',
    'port5': 'Port de Anvers (BL)',
    'port6': 'Port de Barcelone (ES)',
    'port7': 'Port de Rotterdam (NL)',  
    'activite': 'NOS ACTIVITÉS PRINCIPALES SONT :',
    'activite1':'Gérer le déchargement et la réception des containeurs',
    'activite2':'Gérer le placement en zone de stockage temporaire',
    'activite3':'Gérer le chargement des containeurs sur les remorques de transport routier ou ferroviaire',
    'activite4':'Gérer le processus d’acheminement de fret de « porte à porte ».',
    'organigrame':'ORGANIGRAMME DE L"ENTREPRISE',
    'typeContainer': 'libelle type container :',
    'longueurConatainer': 'longueur Container :',
    'largeurContainer': 'largeur Container :',
    'hauteurContainer': 'hauteur Container:',
    'container': 'consultation des containers',
    
    
    },

    'en' : {
    'entreprise' : 'company',
    'conteneur' : 'container',
    'titre_pre' : 'THOLDI IS A MARITIME FREIGHT TRANSPORT COMPANY',
    'carousel1': 'Refrigerated freight',
    'carousel1txt' : 'The refrigerated freight transported around the world mainly concerns meat, fish, dairy products, fruits and vegetables (80% of which are bananas, citrus fruits and others ...).',
    'services': 'WE OFFER SEVERAL SERVICES TO OUR CUSTOMERS',
    'services1' : 'Storage and repair of refrigerated containers.',
    'services2': 'Transport of non-hazardous bulk liquids.',
    'services3': 'Installation and provision of shipping containers in storage areas.',
    'port1': 'Port of Gennnevilliers (FR)',
    'port2': 'Port of Havre (FR)',
    'port3': 'Port of Marseille (FR)',
    'port4': 'Port of Hambourg (DE)',
    'port5': 'Port of Anvers (BL)',
    'port6': 'Port of Barcelone (ES)',
    'port7': 'Port of Rotterdam (NL)', 
    'activite': 'OUR MAIN ACTIVITIES ARE:',
    'activite1':'Manage the unloading and reception of containers',
    'activite2':'Manage placement in temporary storage area',
    'activite3':'Manage container loading on road or rail transport trailers',
    'activite4':'Manage the door-to-door freight forwarding process.',
    'organigrame':'COMPANY ORGANIZATION CHART',
    'typeContainer' : 'container type label :',
    'longueurConatainer': 'Container length :',
    'largeurContainer': 'Container width :',
    'hauteurContainer': 'Container height :',
    'container':'consultation of containers',
    }


}

$(function(){
    $('.translate').click(function(){
        var lang = $(this).attr('id');

        $('.lang').each(function(){
            $(this).text(arrLang[lang][$(this).attr('key')])
        });
    });

});