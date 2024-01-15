<template>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						Enter Text
						<form class="container-fluid">
							<input
								type="text"
								class="container-fluid"
								name="alphaText"
								v-model="alphaText"
								v-on:keyup="phoneticize()"
							/>
						</form>
					</div>

					<div class="card-body">
						{{ upperAlphaText }}<br /><br />
						<div v-for="item in phoneticText">{{ item.substr(0, 1) }} - {{ item }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
function isEmpty(obj) {
	for (var key in obj) {
		if (obj.hasOwnProperty(key)) return false;
	}
	return true;
}

export default {
	data: function() {
		return {
			alphaText: '',
			upperAlphaText: '',
			phoneticText: ['Alpha', 'Bravo', 'Charlie', 'Delta'],
			dictionary: []
		};
	},
	methods: {
		phoneticize() {
			this.upperAlphaText = this.alphaText.toUpperCase();
			this.phoneticText = [];
			if (!isEmpty(this.upperAlphaText)) {
				//for (let cntr = 0; cntr < this.upperAlphaText.length(); cntr++) {
				//this.phoneticText[cntr] = this.upperAlphaText.substr();

				for (let cnt = 0; cnt < this.upperAlphaText.length; cnt++) {
					if (this.upperAlphaText.charCodeAt(cnt) < 65 || this.upperAlphaText.charCodeAt(cnt) > 90) {
						this.phoneticText.push(this.upperAlphaText.substr(cnt, 1));
					} else {
						for (let num = 0; num < 26; num++) {
							if (this.upperAlphaText.substr(cnt, 1) == this.dictionary.alpha[num].Ltr) {
								this.phoneticText.push(this.dictionary.alpha[num].Phn);
							}
						}
					}
				}
			}
		},
		setDictionary() {
			const text =
				'{ "alpha" : [' +
				'{ "Ltr":"A", "Phn":"Alpha" },' +
				'{ "Ltr":"B", "Phn":"Bravo" },' +
				'{ "Ltr":"C", "Phn":"Charlie" },' +
				'{ "Ltr":"D", "Phn":"Delta" },' +
				'{ "Ltr":"E", "Phn":"Echo" },' +
				'{ "Ltr":"F", "Phn":"Foxtrot" },' +
				'{ "Ltr":"G", "Phn":"Golf" },' +
				'{ "Ltr":"H", "Phn":"Hotel" },' +
				'{ "Ltr":"I", "Phn":"India" },' +
				'{ "Ltr":"J", "Phn":"Juliet" },' +
				'{ "Ltr":"K", "Phn":"Kilo" },' +
				'{ "Ltr":"L", "Phn":"Lima" },' +
				'{ "Ltr":"M", "Phn":"Mike" },' +
				'{ "Ltr":"N", "Phn":"November" },' +
				'{ "Ltr":"O", "Phn":"Oscar" },' +
				'{ "Ltr":"P", "Phn":"Papa" },' +
				'{ "Ltr":"Q", "Phn":"Quebec" },' +
				'{ "Ltr":"R", "Phn":"Romeo" },' +
				'{ "Ltr":"S", "Phn":"Sierra" },' +
				'{ "Ltr":"T", "Phn":"Tango" },' +
				'{ "Ltr":"U", "Phn":"Uniform" },' +
				'{ "Ltr":"V", "Phn":"Victor" },' +
				'{ "Ltr":"W", "Phn":"Whiskey" },' +
				'{ "Ltr":"X", "Phn":"X-Ray" },' +
				'{ "Ltr":"Y", "Phn":"Yankee" },' +
				'{ "Ltr":"Z", "Phn":"Zulu"  } ]}';

			this.dictionary = JSON.parse(text);
		}
	},
	mounted() {
		console.log('Component mounted.');
		this.setDictionary();
		console.log(this.dictionary);
	}
};
</script>
