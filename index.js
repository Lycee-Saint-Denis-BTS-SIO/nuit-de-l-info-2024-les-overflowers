document.addEventListener('DOMContentLoaded', function () {

    Highcharts.chart('container', {
        chart: {
            zooming: {
                type: 'xy' // Permet de zoomer sur les axes X et Y
            }
        },
        title: {
            text: 'Comparatif entre l\'Océan et le Corps Humain'
        },
        subtitle: {
            text: 'Données sur la composition, la régulation thermique et chimique'
        },
        xAxis: [{
            categories: [
                'Eau (%)', 'Régulation thermique', 'Absorption chimique', 'Surface couverte'
            ],
            crosshair: true // Indique les lignes croisées au survol
        }],
        yAxis: [{ // Premier axe Y
            labels: {
                format: '{value}%',
                style: {
                    color: Highcharts.getOptions().colors[2]
                }
            },
            title: {
                text: 'Pourcentage (%)',
                style: {
                    color: Highcharts.getOptions().colors[2]
                }
            }
        }, { // Deuxième axe Y
            gridLineWidth: 0,
            title: {
                text: 'Surface (millions de km²)',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value} Mkm²',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            opposite: true
        }],
        tooltip: {
            shared: true, // Affiche toutes les séries simultanément
            useHTML: true,
            headerFormat: '<b>{point.key}</b><br>'
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            x: 80,
            verticalAlign: 'top',
            y: 55,
            floating: true,
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || 'rgba(255,255,255,0.25)'
        },
        series: [{
            name: 'Océan',
            type: 'column',
            data: [70, 90, 25, 361], // Pourcentage d'eau, régulation thermique, CO2 absorbé, surface
            tooltip: {
                valueSuffix: ' %'
            },
            color: '#0077be' // Couleur bleue pour représenter l'océan
        }, {
            name: 'Corps Humain',
            type: 'column',
            data: [60, 98, 75, 2], // Pourcentage d'eau, régulation thermique, O2 absorbé, surface corporelle approximative
            tooltip: {
                valueSuffix: ' %'
            },
            color: '#ff5733' // Couleur orange pour représenter le corps humain
        }, {
            name: 'Moyenne Globale',
            type: 'line', // Ligne pointillée pour la moyenne
            data: [65, 94, 50, 181.5], // Moyenne entre les données de l'océan et du corps humain
            tooltip: {
                valueSuffix: ' %'
            },
            color: '#28a745', // Couleur verte pour la moyenne
            dashStyle: 'ShortDash', // Style pointillé
            marker: {
                enabled: true,
                symbol: 'circle'
            }
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500 // Si la largeur de l'écran est inférieure à 500px
                },
                chartOptions: {
                    legend: {
                        floating: false,
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom',
                        x: 0,
                        y: 0
                    },
                    yAxis: [{
                        labels: {
                            align: 'right',
                            x: 0,
                            y: -6
                        },
                        showLastLabel: false
                    }, {
                        labels: {
                            align: 'left',
                            x: 0,
                            y: -6
                        },
                        showLastLabel: false
                    }]
                }
            }]
        }
    });
});





/* ********************************************* */
