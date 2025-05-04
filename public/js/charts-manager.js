window.chartInstances = {};

function initChart(chartId, config) {
    if (window.chartInstances[chartId]) {
        window.chartInstances[chartId].destroy();
    }

    // Obtener el elemento canvas
    const ctx = document.getElementById(chartId);

    if (!ctx) {
        console.log(`No se encontró el elemento con id: ${chartId}`);
        return;
    }

    try {
        // Crear nuevo gráfico y almacenar la instancia
        window.chartInstances[chartId] = new Chart(ctx, config);
        console.log(`Gráfico ${chartId} inicializado correctamente`);
    } catch (error) {
        console.error(`Error al inicializar el gráfico ${chartId}:`, error);
    }
}

// Función para inicializar todos los gráficos
function initAllCharts() {
    console.log('Inicializando todos los gráficos...');

    // Gráfico de Estado Actual
    initChart('estadoActualChart', {
        type: 'bar',
        data: {
            labels: ['RADICADA', 'EMPRESA', 'POR RADICAR', 'POR RADICAR / INCOMPLETAS', 'SOLICITUD DE PAGO', 'PAGADA', 'RECHAZADA', 'NEGADA', 'EMPRESA-RADICADA', 'PAGO DIRECTO'],
            datasets: [{
                label: 'Valor ($)',
                data: [248216169, 39026248, 7117500, 5741450, 2989350, 1971147, 1778813, 854100, 0, 0],
                backgroundColor: 'rgba(217, 76, 76, 1)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `$${context.raw.toLocaleString()}`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        callback: function(value) {
                            return `$${value.toLocaleString()}`;
                        },
                        font: {
                            size: 10
                        }
                    },
                    title: {
                        display: true,
                        text: 'Valor ($)',
                        color: 'red'
                    }
                },
                y: {
                    ticks: {
                        font: {
                            size: 8
                        }
                    },
                    title: {
                        display: true,
                        text: 'Estado Actual',
                        color: 'red'
                    }
                }
            }
        }
    });

    // Gráfico de Entidad Responsable
    initChart('entidadResponsableChart', {
        type: 'bar',
        data: {
            labels: ['Salud Total S.A.', 'EPS Sura', 'Famisanar', 'Mutual Ser', 'E.P.S Sanitas', 'Nueva EPS', 'Compensar', 'Coosalud E.S.S.', 'S.O.S. S.A. EPS', 'ARL BOLIVAR', 'Aliansalud EPS', 'Porvenir', 'Cajacopi Atl. EPS'],
            datasets: [{
                label: 'Valor ($)',
                data: [71476706, 50517075, 30548969, 29066700, 27415080, 26918116, 20321751, 16298533, 12738245, 8272531, 4722161, 2799550, 2005467],
                backgroundColor: 'rgba(217, 76, 76, 1)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `$${context.raw.toLocaleString()}`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        callback: function(value) {
                            return `$${value.toLocaleString()}`;
                        },
                        font: {
                            size: 10
                        }
                    },
                    title: {
                        display: true,
                        text: 'Valor ($)',
                        color: 'red'
                    }
                },
                y: {
                    ticks: {
                        font: {
                            size: 8
                        }
                    },
                    title: {
                        display: true,
                        text: 'Entidad Responsable',
                        color: 'red'
                    }
                }
            }
        }
    });

    //Gráfico de Entidad Edadd Rango
    initChart('edadRangoChart', {
        type: 'bar',
        data: {
            labels: ['0 a 5 Días', '6 a 15 Días', '16 a 30 Días', 'Más de 30 Días'],
            datasets: [{
                label: 'Valor ($)',
                data: [99830316, 129941184, 35795076, 42128201],
                backgroundColor: 'rgba(217, 76, 76, 1)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `$${context.raw.toLocaleString()}`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        callback: function(value) {
                            return `$${value.toLocaleString()}`;
                        },
                        font: {
                            size: 10
                        }
                    },
                    title: {
                        display: true,
                        text: 'Valor ($)',
                        color: 'red'
                    }
                },
                y: {
                    ticks: {
                        font: {
                            size: 8
                        }
                    },
                    title: {
                        display: true,
                        text: 'Edad al Recibir Rango',
                        color: 'red'
                    }
                }
            }
        }
    });
    // Gráfico de Origen
    initChart('origenChart', {
        type: 'bar',
        data: {
            labels: ['Enfermedad General', 'Licencia de Maternidad', 'Accidente Transito', 'Accidente Laboral', 'Licencia de Paternidad'],
            datasets: [{
                label: 'Valor ($)',
                data: [175020906, 93532332, 24009700, 9117174, 6014665],
                backgroundColor: 'rgba(217, 76, 76, 1)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `$${context.raw.toLocaleString()}`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        callback: function(value) {
                            return `$${value.toLocaleString()}`;
                        },
                        font: {
                            size: 10
                        }
                    },
                    title: {
                        display: true,
                        text: 'Valor ($)',
                        color: 'red'
                    }
                },
                y: {
                    ticks: {
                        font: {
                            size: 8
                        }
                    },
                    title: {
                        display: true,
                        text: 'Origen',
                        color: 'red'
                    }
                }
            }
        }
    });
    // Gráfico de Via de Atención
    initChart('viaAtencionChart', {
        type: 'bar',
        data: {
            labels: ['Red de EPS', 'Poliza de Salud'],
            datasets: [{
                label: 'Valor ($)',
                data: [231173844, 76520933],
                backgroundColor: 'rgba(217, 76, 76, 1)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `$${context.raw.toLocaleString()}`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        callback: function(value) {
                            return `$${value.toLocaleString()}`;
                        },
                        font: {
                            size: 10
                        }
                    },
                    title: {
                        display: true,
                        text: 'Valor ($)',
                        color: 'red'
                    }
                },
                y: {
                    ticks: {
                        font: {
                            size: 8
                        }
                    },
                    title: {
                        display: true,
                        text: 'Via de Atención',
                        color: 'red'
                    }
                }
            }
        }
    });
}

// Función para verificar y reinicializar los gráficos
function checkAndReinitializeCharts() {
    console.log('Verificando si los gráficos necesitan reinicialización...');

    // Lista de IDs de los gráficos que esperamos encontrar
    const expectedChartIds = [
        'estadoActualChart',
        'entidadResponsableChart',
        'edadRangoChart',
        'origenChart',
        'viaAtencionChart'
    ];

    // Verificar cada gráfico esperado
    let needsReinitialization = false;

    for (const chartId of expectedChartIds) {
        const canvas = document.getElementById(chartId);
        if (canvas) {
            // El canvas existe en el DOM
            if (!window.chartInstances[chartId]) {
                // Pero no tenemos una instancia de gráfico para él
                console.log(`Canvas ${chartId} encontrado sin instancia de gráfico correspondiente`);
                needsReinitialization = true;
            }
        }
    }

    if (needsReinitialization) {
        console.log('Reinicializando gráficos...');
        initAllCharts();
    } else {
        console.log('Todos los gráficos están correctamente inicializados');
    }
}

// Funciones para actualizar los gráficos con datos filtrados
function updateChartByDate(chartId, startDate, endDate = null) {
    console.log(`Actualizando gráfico ${chartId} con fechas:`, startDate, endDate);
    // Implementación futura para actualización con datos reales
}

// Función para actualizar todos los gráficos basados en un filtro de fecha
function updateAllChartsByDate(startDate, endDate = null) {
    updateChartByDate('estadoActualChart', startDate, endDate);
    updateChartByDate('entidadResponsableChart', startDate, endDate);
    updateChartByDate('edadRangoChart', startDate, endDate);
    updateChartByDate('origenChart', startDate, endDate);
    updateChartByDate('viaAtencionChart', startDate, endDate);
}

// Exponer funciones al ámbito global
window.chartFunctions = {
    initChart,
    initAllCharts,
    checkAndReinitializeCharts,
    updateChartByDate,
    updateAllChartsByDate
};

// Sistema de inicialización y monitoreo de gráficos
(function setupChartSystem() {
    // Inicializar gráficos cuando el DOM esté listo
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM cargado, inicializando gráficos...');
        initAllCharts();

        // Configurar verificaciones periódicas para asegurarnos de que los gráficos existen
        setInterval(checkAndReinitializeCharts, 2000);
    });

    // Manejar eventos de navegación para reinicializar gráficos
    window.addEventListener('popstate', function() {
        console.log('Navegación detectada, verificando gráficos después de un breve retraso...');
        setTimeout(checkAndReinitializeCharts, 500);
    });

    // Escuchar eventos de Livewire
    if (typeof Livewire !== 'undefined') {
        document.addEventListener('livewire:load', function() {
            console.log('Livewire cargado, configurando hooks...');

            // Cuando Livewire actualiza el DOM
            Livewire.hook('message.processed', () => {
                console.log('Mensaje Livewire procesado, verificando gráficos...');
                setTimeout(checkAndReinitializeCharts, 100);
            });

            // Cuando cambia la URL
            Livewire.hook('component.initialized', () => {
                console.log('Componente Livewire inicializado, verificando gráficos...');
                setTimeout(checkAndReinitializeCharts, 100);
            });
        });
    }

    // Una verificación adicional después de que todo se haya cargado
    window.addEventListener('load', function() {
        console.log('Ventana completamente cargada, verificación final de gráficos...');
        setTimeout(checkAndReinitializeCharts, 1000);
    });

    // MutationObserver para detectar cambios en el DOM
    const domObserver = new MutationObserver((mutations) => {
        let shouldCheck = false;

        mutations.forEach(mutation => {
            // Si se añadieron nodos
            if (mutation.addedNodes.length) {
                for (let i = 0; i < mutation.addedNodes.length; i++) {
                    const node = mutation.addedNodes[i];
                    // Verificar si alguno de los nodos añadidos es un canvas o contiene un canvas
                    if (node.nodeType === 1 && // ELEMENT_NODE
                         (node.tagName === 'CANVAS' ||
                          node.querySelector('canvas'))) {
                        shouldCheck = true;
                        break;
                    }
                }
            }
        });

        if (shouldCheck) {
            console.log('Cambios en el DOM detectados, verificando gráficos...');
            setTimeout(checkAndReinitializeCharts, 100);
        }
    });

    // Iniciar la observación del DOM una vez que esté listo
    document.addEventListener('DOMContentLoaded', () => {
        domObserver.observe(document.body, {
            childList: true,
            subtree: true
        });
    });
})();
