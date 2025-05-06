function updateGreeting() {
    
    const hour = new Date().getHours();
    
    let greeting = 'Witaj';
    
    if (hour >= 5 && hour < 12) {
        greeting = 'Miłego Poranka';
    } else if (hour >= 12 && hour < 18) {
        greeting = 'Miłego Popołudnia';
    } else if (hour >= 18 && hour < 22) {
        greeting = 'Miłego Wieczoru';
    } else {
        greeting = 'Dobrej Nocy';
    }
    
    document.getElementById('timeGreeting').textContent = greeting;
}

document.addEventListener('DOMContentLoaded', function() {
    updateGreeting();
});