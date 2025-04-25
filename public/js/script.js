document.addEventListener('DOMContentLoaded', () => {
    const accountToggle = document.getElementById('account-toggle');
    const accountDropdown = document.getElementById('account-dropdown');

    if (accountToggle && accountDropdown) {
        accountToggle.addEventListener('click', () => {
            const isVisible = accountDropdown.style.display === 'block';
            accountDropdown.style.display = isVisible ? 'none' : 'block';
        });

        document.addEventListener('click', (event) => {
            if (
                !accountDropdown.contains(event.target) &&
                !accountToggle.contains(event.target)
            ) {
                accountDropdown.style.display = 'none';
            }
        });
    }
});
