document.addEventListener('DOMContentLoaded', function() {
    // Initialize state
    let selectedSystem = null;
    let selectedCategory = null;
    let searchQuery = '';
    
    // DOM elements
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const systemFiltersContainer = document.getElementById('system-filters');
    const categoryFiltersContainer = document.getElementById('category-filters');
    const plantsContainer = document.getElementById('plants-container');
    const noPlants = document.getElementById('no-plants');
    const plantsCount = document.getElementById('plants-count');
    const searchInput = document.getElementById('search-input');
    const currentYearElement = document.getElementById('current-year');
    
    // Set current year in footer
    currentYearElement.textContent = new Date().getFullYear();
    
    // Mobile menu toggle
    menuToggle.addEventListener('click', function() {
      mobileMenu.classList.toggle('active');
      if (mobileMenu.classList.contains('active')) {
        menuIcon.classList.remove('fa-bars');
        menuIcon.classList.add('fa-times');
      } else {
        menuIcon.classList.remove('fa-times');
        menuIcon.classList.add('fa-bars');
      }
    });
    
    // Create system filter buttons
    ayushSystemsData.forEach(system => {
      const button = document.createElement('button');
      button.className = `filter-btn ${system.color}`;
      button.dataset.system = system.id;
      button.textContent = system.name;
      
      button.addEventListener('click', function() {
        if (selectedSystem === system.id) {
          selectedSystem = null;
          button.classList.remove('active');
        } else {
          // Remove active class from all system buttons
          document.querySelectorAll('.filter-btn[data-system]').forEach(btn => {
            btn.classList.remove('active');
          });
          selectedSystem = system.id;
          button.classList.add('active');
        }
        updatePlantsList();
      });
      
      systemFiltersContainer.appendChild(button);
    });
    
    // Create category filter buttons
    categoriesData.forEach(category => {
      const button = document.createElement('button');
      button.className = 'filter-btn category';
      button.dataset.category = category.id;
      button.textContent = category.name;
      
      button.addEventListener('click', function() {
        if (selectedCategory === category.id) {
          selectedCategory = null;
          button.classList.remove('active');
        } else {
          // Remove active class from all category buttons
          document.querySelectorAll('.filter-btn[data-category]').forEach(btn => {
            btn.classList.remove('active');
          });
          selectedCategory = category.id;
          button.classList.add('active');
        }
        updatePlantsList();
      });
      
      categoryFiltersContainer.appendChild(button);
    });
    
    // Search input handler
    searchInput.addEventListener('input', function(e) {
      searchQuery = e.target.value.toLowerCase();
      updatePlantsList();
    });
    
    // Function to create a plant card
    function createPlantCard(plant) {
      const card = document.createElement('div');
      card.className = 'plant-card';
      
      const systemDots = plant.systems.map(system => 
        `<span class="system-dot ${system}" title="${getSystemName(system)}"></span>`
      ).join('');
      
      card.innerHTML = `
        <div class="plant-image-container">
          <img src="${plant.imageUrl}" alt="${plant.name}" class="plant-image">
          <div class="plant-systems">
            ${systemDots}
          </div>
        </div>
        <div class="plant-content">
          <div class="plant-header">
            <h3 class="plant-name">${plant.name}</h3>
            <span class="plant-category">${plant.category}</span>
          </div>
          <p class="plant-scientific-name">${plant.scientificName}</p>
          <p class="plant-description">${plant.description}</p>
          <div class="plant-footer">
            <div class="plant-parts">
              <i class="fas fa-leaf"></i>
              <span>${plant.parts.join(', ')}</span>
            </div>
            <button class="details-btn">
              Details
              <i class="fas fa-info-circle"></i>
            </button>
          </div>
        </div>
      `;
      
      // Add event listener to details button
      const detailsBtn = card.querySelector('.details-btn');
      detailsBtn.addEventListener('click', function() {
        alert(`Details for ${plant.name} will be displayed here.`);
      });
      
      return card;
    }
    
    // Helper function to get system name from id
    function getSystemName(systemId) {
      const system = ayushSystemsData.find(s => s.id === systemId);
      return system ? system.name : '';
    }
    
    // Function to filter plants based on selected filters and search query
    function filterPlants() {
      return plants.filter(plant => {
        const matchesSystem = selectedSystem ? plant.systems.includes(selectedSystem) : true;
        const matchesCategory = selectedCategory ? plant.category === selectedCategory : true;
        const matchesSearch = searchQuery 
          ? plant.name.toLowerCase().includes(searchQuery) || 
            plant.scientificName.toLowerCase().includes(searchQuery)
          : true;
        
        return matchesSystem && matchesCategory && matchesSearch;
      });
    }
    
    // Function to update the plants list based on filters
    function updatePlantsList() {
      const filteredPlants = filterPlants();
      
      // Clear the plants container
      plantsContainer.innerHTML = '';
      
      // Update plants count if filters are applied
      if (selectedSystem || selectedCategory || searchQuery) {
        plantsCount.textContent = `(${filteredPlants.length} plants found)`;
        plantsCount.classList.remove('hidden');
      } else {
        plantsCount.classList.add('hidden');
      }
      
      // Show plants or no plants message
      if (filteredPlants.length > 0) {
        filteredPlants.forEach(plant => {
          plantsContainer.appendChild(createPlantCard(plant));
        });
        plantsContainer.classList.remove('hidden');
        noPlants.classList.add('hidden');
      } else {
        plantsContainer.classList.add('hidden');
        noPlants.classList.remove('hidden');
      }
    }
    
    // Initialize plants list
    updatePlantsList();
  });