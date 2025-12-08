const popup = document.getElementById("popup");
const btnClose = document.getElementById("btnClose");
const rowName = document.getElementById("rowName");



//fillable js content
const orderID = document.getElementById("orderID");
const orderDate = document.getElementById("orderDate");
const totalPrice = document.getElementById("totalPrice");
const orderStatus = document.getElementById("orderStatus");
const paymentStatus = document.getElementById("paymentStatus");
const productIds = document.getElementById("productIds");
const productAmounts = document.getElementById("productAmounts");
const productNames = document.getElementById("productNames");
const productPrices = document.getElementById("productPrices");

//adds eventlistener to every rowJS object

document.querySelectorAll('.rowJS').forEach(e => {

    e.addEventListener('click', () => {
        //checks if other popup is open or not opened
        if (popup.style.display === "none") {
            //removes letter "r" from the order row
            const substringId = e.id.substring(1)
            //changed few values and shows
            rowName.textContent = substringId
            popup.style.display = "block";
            //function to fetch
            fetchOrder(substringId);
        }
    });

});

btnClose.addEventListener("click", () => {
    popup.style.display = "none";
})


//fetch function
function fetchOrder(id) {
    //tries to fecth content 
    async function fetchUrl(file) {
    try {
        //for checking file content and its succcess
        const response = await fetch(file);
        if (!response.ok) {
        throw new Error(`HTTP error: ${response.status}`);
        }
        //turns response into usable form (json)
        const res = await response.json();

        //changes values of html objects from json file when fetch is succeess
        orderID.textContent = res[0]["orderID"];
        orderDate.textContent = res[0]["orderDate"];
        totalPrice.textContent = res[0]["totalPrice"];
        orderStatus.textContent = res[0]["orderStatus"];
        paymentStatus.textContent = res[0]["paymentStatus"];
        productIds.textContent = res[0]["productIds"];
        productAmounts.textContent = res[0]["productAmounts"];
        productNames.textContent = res[0]["productNames"];
        productPrices.textContent = res[0]["productPrices"];

    } catch (error) {
        console.error(`Fetch error: ${error.message}`);
        }
    }
    //fetch url (needs to be changed when other device is api host)
    const url = "http://localhost/verkkokauppaProjektityo-v1/backend/api/orders/get_orders.php?order_id="+id;
    fetchUrl(url);
}