const formatCurrency = (value) => new Intl.NumberFormat('en-PH', { style: 'currency', currency: 'PHP' }).format(value);

const formatPercent = (value) => `${Number(value).toFixed(2)}%`;

const calculateRevenue = (totalPrice, teamMembers) => {
    const members = Math.max(1, parseInt(teamMembers, 10) || 1);
    const price = parseFloat(totalPrice) || 0;
    const percentShare = 100 / members;
    const shareAmount = price * (percentShare / 100);

    return {
        percentShare: percentShare.toFixed(2),
        shareAmount: shareAmount.toFixed(2),
    };
};

const initRevenueCalculator = () => {
    const form = document.querySelector('[data-revenue-form]');
    if (!form) {
        return;
    }

    const totalPriceInput = form.querySelector('[data-total-price]');
    const teamMembersInput = form.querySelector('[data-team-members]');
    const percentDisplay = form.querySelector('[data-percent-share]');
    const amountDisplay = form.querySelector('[data-share-amount]');

    const update = () => {
        const { percentShare, shareAmount } = calculateRevenue(totalPriceInput?.value, teamMembersInput?.value);

        if (percentDisplay) {
            percentDisplay.textContent = formatPercent(percentShare);
        }

        if (amountDisplay) {
            amountDisplay.textContent = formatCurrency(shareAmount);
        }
    };

    totalPriceInput?.addEventListener('input', update);
    teamMembersInput?.addEventListener('input', update);
    update();
};

const initDarkMode = () => {
    const toggle = document.querySelector('[data-dark-toggle]');
    const root = document.documentElement;
    const stored = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

    if (stored === 'dark' || (!stored && prefersDark)) {
        root.classList.add('dark');
    }

    toggle?.addEventListener('click', () => {
        root.classList.toggle('dark');
        localStorage.setItem('theme', root.classList.contains('dark') ? 'dark' : 'light');
    });
};

const initDeleteModal = () => {
    const modal = document.querySelector('[data-delete-modal]');
    const form = document.querySelector('[data-delete-form]');
    const message = document.querySelector('[data-delete-message]');
    const cancelButtons = document.querySelectorAll('[data-delete-cancel]');

    if (!modal || !form) {
        return;
    }

    document.querySelectorAll('[data-delete-trigger]').forEach((button) => {
        button.addEventListener('click', () => {
            const name = button.getAttribute('data-project-name') ?? 'this project';
            const action = button.getAttribute('data-delete-url');

            if (message) {
                message.textContent = `Are you sure you want to delete "${name}"? This action cannot be undone.`;
            }

            if (action) {
                form.setAttribute('action', action);
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });
    });

    const close = () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    };

    cancelButtons.forEach((button) => button.addEventListener('click', close));
    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            close();
        }
    });
};

const initToasts = () => {
    const container = document.querySelector('[data-toast-container]');
    const toast = document.querySelector('[data-toast]');

    if (!container || !toast) {
        return;
    }

    setTimeout(() => {
        toast.classList.add('opacity-0', 'translate-x-4');
        setTimeout(() => container.remove(), 300);
    }, 4000);
};

const initRevenueChart = () => {
    const canvas = document.getElementById('revenueChart');
    if (!canvas || typeof Chart === 'undefined') {
        return;
    }

    const labels = JSON.parse(canvas.dataset.labels ?? '[]');
    const data = JSON.parse(canvas.dataset.values ?? '[]');

    new Chart(canvas, {
        type: 'line',
        data: {
            labels,
            datasets: [
                {
                    label: 'Revenue',
                    data,
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    fill: true,
                    tension: 0.3,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: (value) => formatCurrency(value),
                    },
                },
            },
        },
    });
};

document.addEventListener('DOMContentLoaded', () => {
    initDarkMode();
    initRevenueCalculator();
    initDeleteModal();
    initToasts();
    initRevenueChart();
});
