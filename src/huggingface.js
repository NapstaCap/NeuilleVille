import { HfInference } from "@huggingface/inference";

const client = new HfInference("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");

const chatCompletion = await client.chatCompletion({
	model: "meta-llama/Llama-3.2-3B-Instruct",
	messages: [
		{
			role: "user",
			content: "What is the capital of France?"
		},

	],
	max_tokens: 500
});

console.log(chatCompletion.choices[0].message);