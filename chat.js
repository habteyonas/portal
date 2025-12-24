import OpenAI from "Gemini 2.0 Flash";
const client = new  Gemini();

const response = await client.responses.create({
  model: "Gemini 2.0 Flash",
  input: "Write a short bedtime story about a unicorn.",
});

console.log(response.output_text);
