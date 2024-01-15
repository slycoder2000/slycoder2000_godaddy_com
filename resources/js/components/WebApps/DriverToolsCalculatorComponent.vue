<template>
	<form>
		<div
			v-for="lineitem in lineitems"
			:key="lineitem.id"
			class="lineitem row justify-content-md-center"
			style="height:1.5rem"
		>
			<!-- <div class="form-group col-1"> -->
			<!--input type="checkbox" v-model="lineitem.pos" @change="saveRow()"-->
			<!--@change="transfer(lineitem.pos)" -->
			<!-- </div>  -->
			<div class="form-group col-6">
				<input
					class="form-control form-control-sm"
					type="text"
					style="height:1.5rem"
					v-model="lineitem.desc"
					placeholder="desc"
					@change="saveRow()"
					@keyup="saveRow()"
				/>
			</div>

			<div class="input-group col-4 mb-3">
				<input
					class="form-control form-control-sm"
					type="text"
					style="height:1.5rem"
					v-model="lineitem.amount"
					placeholder="amount"
					@change="calcTotalAmount()"
					@keyup="calcTotalAmount()"
				/>
				<div class="input-group-append">
					<div class="input-group-text">
						<input
							type="checkbox"
							name="acs"
							:checked="lineitem.calc"
							@input="freshenCheckbox(lineitem.id, lineitem.calc)"
						/>
					</div>
				</div>
			</div>

			<!-- <div class="form-group col-3"> -->
			<!-- {{lineitem.calc}} -->
			<!-- </div>  -->
		</div>

		<div
			style="border:2px solid #000; width:300px; background-color:#fff; color:#000; text-align:center;"
			@click="syncAllCheckBoxes()"
		>
			Total amount: {{ totalAmount }}
		</div>

		<br />
	</form>
</template>

<script>
export default {
	data: function() {
		return {
			STORAGE_KEY: 'driver-calculator-storage',
			spreadsheet: '',
			lineitems: [],
			totalAmount: 0,
			calcItems: [],
			xferFrom: -1,
			xferTo: -1,
			mxfer: false
		};
	},
	created() {
		//localStorage.removeItem(this.STORAGE_KEY);
		this.lineitems = JSON.parse(localStorage.getItem(this.STORAGE_KEY) || '[]');
		// if lineitems is empty, create array of 14 rows (0-13)
		console.log(this.isEmpty(this.lineitems));
		if (this.isEmpty(this.lineitems)) {
			for (let cntr = 0; cntr < 20; cntr++) {
				this.lineitems.push({ desc: '', id: cntr, amount: '', pos: false, calc: true });
			}
			localStorage.setItem(this.STORAGE_KEY, JSON.stringify(this.lineitems));
		}
		this.calcTotalAmount();
	},
	methods: {
		isEmpty: function(obj) {
			for (var key in obj) {
				if (obj.hasOwnProperty(key)) return false;
			}
			return true;
		},
		freshenCheckbox: function(id, chkBoxVal) {
			this.lineitems[id].calc = !chkBoxVal;
			//alert(id + '  ' + chkBoxVal);
			this.syncAllCheckBoxes();
			this.calcTotalAmount();
		},
		syncAllCheckBoxes: function() {
			let items = document.getElementsByName('acs');
			let selectedItems = '';
			for (let i = 0; i < items.length; i++) {
				//if (items[i].type == 'checkbox' && items[i].checked == true)

				if (items[i].checked != this.lineitems[i].calc) this.lineitems[i].calc = items[i].checked;

				//selectedItems += items[i].checked + ' ' + this.lineitems[i].calc + '\n';
			}

			//console.log(items);
			//console.log(items[6].checked);
			//console.log(items.length);

			//alert(selectedItems);
		},

		saveRow() {
			localStorage.setItem(this.STORAGE_KEY, JSON.stringify(this.lineitems));
			//this.freshenCheckbox();
		},
		addRow(cntr) {
			this.lineitems.push({ desc: '', id: cntr, amount: '', pos: false, calc: true });
		},

		fpArithmetic: function(op, x, y) {
			var n = {
				'*': x * y,

				'-': x - y,

				'+': x + y,

				'/': x / y
			}[op];
			return Math.round(n * 100) / 100;
		},

		calcTotalAmount() {
			this.totalAmount = 0;
			let ttlAmount = 0;
			let filteredItems = [];

			filteredItems = this.lineitems.filter(item => {
				return item.calc == true && item.amount != '';
			});

			ttlAmount = filteredItems.reduce((currentTotal, item) => {
				return this.fpArithmetic('+', parseFloat(item.amount), parseFloat(currentTotal));
			}, 0);

			console.log(ttlAmount);
			this.totalAmount = ttlAmount;

			console.log(this.totalAmount);
			localStorage.setItem(this.STORAGE_KEY, JSON.stringify(this.lineitems));
		},

		transfer: function(checkedItem) {
			// transferring from one line item to the next requires
			// memorizing where to copy the value from and to
			// clearing the from value
			//console.log(checkedItem);
			if (checkedItem == true) {
				// let foundFirstColumn = -1;
				// let foundLastColumn = -1;
				// this.lineitems.forEach(function(value, i) {
				// 	//console.log('%d: %s %s', i, value.pos, value.calc);
				// 	if (foundFirstColumn == -1 && value.pos) foundFirstColumn = i;
				// 	if (foundLastColumn == -1 && value.calc) foundLastColumn = i;
				// });
				alert(checkedItem);
				if (this.transferFromToColumns()) {
					//console.log(this.checkedRow(pos), this.checkedRow(calc));
					//console.log(this.lineitems[3].amount, this.lineitem[0].desc);

					alert('transfer');
					this.lineitems[0].amount = '11.01';

					//this.processTransfer(100, 1);
					localStorage.setItem(this.STORAGE_KEY, JSON.stringify(this.lineitems));
				} else {
					alert('Please check items in last and first columns.');
					//this.clearFirstColumnCheckboxes();
				}
			}
		},
		transferFromToColumns: function() {
			this.xferFrom = -1;
			this.xferTo = -1;
			let foundItem = [];

			foundItem = this.lineitems.find(item => {
				return item.pos === true;
			});
			if (!this.isEmpty(foundItem)) {
				console.log(foundItem.id);
				this.xferFrom = foundItem.id;
			}

			foundItem = this.lineitems.find(item => {
				return item.calc === true;
			});
			if (!this.isEmpty(foundItem)) {
				console.log(foundItem);
				this.xferTo = foundItem.id;
			}
			if (this.xferFrom != -1 && this.xferTo != -1) {
				return true; // success
			} else {
				return false; // failed
			}
		},
		processTransfer: function(amount, to) {},
		clearFirstColumnCheckboxes: function() {
			this.lineitems.forEach(lineitem => {
				//lineitem.pos = false;
			});
		},
		mtransfer: function() {
			//alert('xfer');
			closeSideMenu();
			this.clearFirstColumnCheckboxes();
			// change bg orange
			document.body.style.background = 'orange';
			// wait for click - store value

			// change bg blue
			document.body.style.background = 'blue';
			// wait for click - store value
			// change bg grey
			document.body.style.background = '#ccc';
		},

		eraseLocalStorage: function() {
			//alert('erasing');
			localStorage.removeItem(this.STORAGE_KEY);
			this.lineitems = JSON.parse(localStorage.getItem(this.STORAGE_KEY) || '[]');
			// if lineitems is empty, create array of 14 rows (0-13)
			console.log(this.isEmpty(this.lineitems));
			if (this.isEmpty(this.lineitems)) {
				for (let cntr = 0; cntr < 20; cntr++) {
					this.addRow();
				}
			}
			this.calcTotalAmount();
			closeSideMenu();
		}
	},
	watch: {},
	computed: {}
};
</script>

<style scoped></style>
