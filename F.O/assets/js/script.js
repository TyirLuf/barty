let state = {
	cur_step: 1,
	monthly_cycle: true,
	yearly_cycle: true,
	cart: {
	  plan: { price: "$0" },
	  addons: [],
	},
	total() {
	  return this.cart.addons.reduce(
		(acc, cur) => (acc += parseInt(cur.price.replace("€", "").trim())),
		parseInt(this.cart.plan.price.replace("€", "").trim())
	  );
	},
  };
  
  function nextStep(a) {
	if (validate(state.cur_step)) {
	  unmount();
	  state.cur_step += a;
	  mount();
	}
	if (state.cur_step == 5) {
	  console.log("order submitted");
	  let formData = new FormData();
	  formData.append("name", state.name_val);
	  formData.append("email", state.email_val);
	  formData.append("phone", state.phone_val);
	  formData.append(state.cart.plan.name, state.cart.plan.price);
	  for (let [k, v] of formData.entries()) console.log(k, v);
	}
  }
  
  function unmount() {
	document
	  .querySelector(`#step-content-${state.cur_step}`)
	  .classList.add("inactive");
	document
	  .querySelector(`#sidebar-step-${state.cur_step}`)
	  .classList.remove("active");
	document.querySelectorAll(".dynamic").forEach((e) => e.remove());
  }
  function mount() {
	document
	  .querySelector(`#step-content-${state.cur_step}`)
	  .classList.remove("inactive");
	if (state.cur_step <= 4) {
	  document
		.querySelector(`#sidebar-step-${state.cur_step}`)
		.classList.add("active");
	}
  
	switch (state.cur_step) {
	  case 2: {
		state.monthly_cycle = !document.getElementById("monthly-plan").checked;
		state.yearly_cycle = document.getElementById("monthly-plan").checked;
		if (state.monthly_cycle) {
		  document
			.getElementById("monthly")
			.classList.remove("inactive-plan-cycle");
		  document.getElementById("yearly").classList.add("inactive-plan-cycle");
		  document.getElementById("plan-1-price").innerHTML = "$9/mo";
		  document.getElementById("plan-2-price").innerHTML = "$12/mo";
		  document.getElementById("plan-3-price").innerHTML = "$15/mo";
		}
		if (state.yearly_cycle) {
		  document
			.getElementById("yearly")
			.classList.remove("inactive-plan-cycle");
		  document.getElementById("monthly").classList.add("inactive-plan-cycle");
		  document.getElementById("plan-1-price").innerHTML = "$90/yr";
		  document.getElementById("plan-2-price").innerHTML = "$120/yr";
		  document.getElementById("plan-3-price").innerHTML = "$150/yr";
		}
		let plans = document.querySelectorAll(".plan");
		plans.forEach((plan) => {
		  if (!plan.hasEventListener) {
			plan.addEventListener("click", function () {
			  document.querySelector(".selected")?.classList.remove("selected");
			  plan.classList.add("selected");
			  state.cart.plan = {
				name: plan.children[1].children[0].innerHTML,
				price: plan.children[1].children[1].innerHTML,
			  };
			  console.log(state);
			  console.log(state.total());
			});
			plan.hasEventListener = true;
		  }
		});
		break;
	  }
	  case 3: {
		if (state.monthly_cycle) {
		  document.getElementById("addon-1-price").innerHTML = "$9/mo";
		  document.getElementById("addon-2-price").innerHTML = "$12/mo";
		  document.getElementById("addon-3-price").innerHTML = "$15/mo";
		}
		if (state.yearly_cycle) {
		  document.getElementById("addon-1-price").innerHTML = "$90/mo";
		  document.getElementById("addon-2-price").innerHTML = "$120/mo";
		  document.getElementById("addon-3-price").innerHTML = "$150/mo";
		}
		let addons = document.querySelectorAll(".addon");
		addons.forEach((addon) => {
		  if (!addon.hasEventListener) {
			addon.addEventListener("click", function () {
			  if (addon.classList.contains("selected")) {
				addon.children[0].checked = false;
				let index = state.cart.addons.findIndex(
				  (item) => item.name === addon.children[1].children[0].innerHTML
				);
				state.cart.addons.splice(index, 1);
				addon.classList.remove("selected");
			  } else {
				addon.classList.add("selected");
				addon.children[0].checked = true;
				state.cart.addons.push({
				  name: addon.children[1].children[0].innerHTML,
				  price: addon.children[2].innerHTML,
				});
			  }
			  console.log(state);
			  console.log(state.total());
			});
			addon.hasEventListener = true;
		  }
		});
	  }
	  case 4: {
		console.log(state);
		let freq = state.monthly_cycle ? "Monthly" : "Yearly";
		let freq_short = state.monthly_cycle ? "mo" : "yr";
		let per = state.monthly_cycle ? "month" : "year";
		document.getElementById("selected-plan").innerHTML = state.cart.plan.name
		  ? `${state.cart.plan.name}(${freq})`
		  : "No Plan selected";
		document.getElementById("selected-plan-price").innerHTML = state.cart.plan
		  .price
		  ? state.cart.plan.price
		  : "$0/" + freq_short;
  
		let cartItems = document.querySelector(".cart-items");
		state.cart.addons.forEach((addon) => {
		  let cartItem = document.createElement("div");
		  cartItem.classList.add("cart-item");
		  cartItem.classList.add("dynamic");
		  let name = document.createElement("div");
		  name.innerHTML = addon.name;
		  let price = document.createElement("div");
		  price.innerHTML = addon.price;
		  cartItem.appendChild(name);
		  cartItem.appendChild(price);
		  cartItems.appendChild(cartItem);
		});
		document.querySelector(
		  ".total"
		).children[0].innerHTML = `Total(per ${per})`;
		document.querySelector(
		  ".total"
		).children[1].innerHTML = `$${state.total()}/${freq_short}`;
	  }
	}
  }
  
  function removeError() {
	this.classList.remove("error");
	document.getElementById(`${this.id}-error`).innerHTML = "";
  }
  
  function reset() {
	let elems = document.querySelectorAll(".selected");
	elems.forEach((elem) => {
	  elem?.classList.remove("selected");
	  if (elem.children[0]) elem.children[0].checked = false;
	});
	state.cart = {
	  plan: { price: "$0" },
	  addons: [],
	};
  }
  
  function validate(a) {
	switch (a) {
	  case 1: {
		let name = document.getElementById("name");
		let email = document.getElementById("email");
		let phone = document.getElementById("phone");
		state.name_val = name.value.trim();
		state.email_val = email.value.trim();
		state.phone_val = phone.value.trim();
		let errorState = false;
		if (state.name_val === "") {
		  errorState = true;
		  name.classList.add("error");
		  document.getElementById("name-error").innerHTML = "*Name is required";
		}
		if (state.email_val === "") {
		  errorState = true;
		  email.classList.add("error");
		  document.getElementById("email-error").innerHTML = "*Email is required";
		}
		if (state.phone_val === "") {
		  errorState = true;
		  phone.classList.add("error");
		  document.getElementById("phone-error").innerHTML = "*Phone is required";
		}
		return !errorState;
	  }
	  default:
		return true;
	}
  }
  