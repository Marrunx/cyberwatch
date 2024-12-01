const provinceSelect = document.getElementById("province");
    const citySelect = document.getElementById("city");
    const barangaySelect = document.getElementById("barangay");

    // Fetch provinces from the API
    async function fetchProvinces() {
        try {
            const response = await fetch("https://psgc.gitlab.io/api/provinces/");
            const provinces = await response.json();

            provinces.forEach(province => {
                const option = document.createElement("option");
                option.value = province.code;
                option.textContent = province.name;
                provinceSelect.appendChild(option);
            });
        } catch (error) {
            console.error("Error fetching provinces:", error);
            provinceSelect.innerHTML = '<option value="" disabled>Error Loading Provinces</option>';

        }
    }

    // Fetch cities/municipalities for the selected province
    // Fetch provinces from the API
async function fetchProvinces() {
    try {
        const response = await fetch("https://psgc.gitlab.io/api/provinces/");
        const provinces = await response.json();

        provinces.forEach(province => {
            const option = document.createElement("option");
            option.value = province.code;
            option.textContent = province.name;
            provinceSelect.appendChild(option);
        });
    } catch (error) {
        console.error("Error fetching provinces:", error);
        provinceSelect.innerHTML = '<option value="" disabled>Error Loading Provinces</option>';
    }
}

// Fetch cities/municipalities for the selected province
async function fetchCities(provinceCode) {
    try {
        const response = await fetch(`https://psgc.gitlab.io/api/provinces/${provinceCode}/cities-municipalities/`);
        const cities = await response.json();

        citySelect.innerHTML = '<option value="" disabled selected>Select a City</option>';
        barangaySelect.innerHTML = '<option value="" disabled selected>Select a City First</option>';
        cities.forEach(city => {
            const option = document.createElement("option");
            option.value = city.code;
            option.textContent = city.name;
            citySelect.appendChild(option);
        });
    } catch (error) {
        console.error("Error fetching cities:", error);
        citySelect.innerHTML = '<option value="" disabled>Error Loading Cities</option>';
    }
}

// Fetch barangays for the selected city/municipality
async function fetchBarangays(cityCode) {
    try {
        const response = await fetch(`https://psgc.gitlab.io/api/cities-municipalities/${cityCode}/barangays/`);
        const barangays = await response.json();

        barangaySelect.innerHTML = '<option value="" disabled selected>Select a Barangay</option>';
        barangays.forEach(barangay => {
            const option = document.createElement("option");
            option.value = barangay.code;
            option.textContent = barangay.name;
            barangaySelect.appendChild(option);
        });
    } catch (error) {
        console.error("Error fetching barangays:", error);
        barangaySelect.innerHTML = '<option value="" disabled>Error Loading Barangays</option>';
    }
}


    // Load provinces on page load
    fetchProvinces();

    // Update cities when a province is selected
    provinceSelect.addEventListener("change", () => {
        const selectedProvinceCode = provinceSelect.value;
        if (selectedProvinceCode) {
            fetchCities(selectedProvinceCode);
        }
    });

    // Update barangays when a city is selected
    citySelect.addEventListener("change", () => {
        const selectedCityCode = citySelect.value;
        if (selectedCityCode) {
            fetchBarangays(selectedCityCode);
        }
    });