<template>
    <div class="container">
        <div class="flex align-items-center justify-content-center">
            <div class="w-30rem">
                <Card>
                    <template #content>
                        <div class="flex flex-column gap-2">
                            <label for="product">Продукты</label>
                            <Dropdown
                                v-model="form.product_id"
                                :options="products"
                                optionLabel="name"
                                optionValue="id"
                                placeholder="выберите продукт"
                                class="w-full"
                            >
                                <template #option="{ option }">
                                    <div
                                        class="flex w-full align-items-center justify-content-between"
                                    >
                                        <div>{{ option.name }}</div>
                                        <div>
                                            € {{ parseFloat(option.price) }}
                                        </div>
                                    </div>
                                </template>
                            </Dropdown>
                        </div>
                        <div class="flex flex-column gap-2 mt-3">
                            <label for="tax_number">TAX номер</label>
                            <InputText
                                id="tax_number"
                                v-model="form.tax_number"
                                class="w-full"
                                placeholder="введите налоговый номер"
                                aria-describedby="username-help"
                            />
                        </div>
                        <div class="mt-3">
                            <Button label="Submit" @click="calculatePrice()" />
                        </div>
                        <div v-if="result" class="mt-3">
                            <table class="table">
                                <tr>
                                    <td>Продукт</td>
                                    <td>{{ result.product?.name }}</td>
                                </tr>
                                <tr>
                                    <td>Цена продукта</td>
                                    <td>
                                        €
                                        {{ parseFloat(result.product?.price) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Страна</td>
                                    <td>{{ result.country?.name }}</td>
                                </tr>
                                <tr>
                                    <td>Страна НАЛОГ цена</td>
                                    <td>
                                        € {{ parseFloat(result.price) }} ({{
                                            parseFloat(
                                                result.country?.tax_percent
                                            )
                                        }}%)
                                    </td>
                                </tr>
                                <tr>
                                    <td>Цена с НДС</td>
                                    <td>
                                        €
                                        {{ parseFloat(result.price_with_tax) }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </template>
                </Card>
            </div>
        </div>
    </div>
    <Toast position="top-center" />
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";
import Card from "primevue/card";
import Dropdown from "primevue/dropdown";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import { useToast } from "primevue/usetoast";
import Toast from "primevue/toast";

const toast = useToast();

const products = ref([]);
const form = ref({});
const is_submit = ref(false);
const result = ref(null);

const calculatePrice = () => {
    axios
        .post("/api/calculate-price", form.value)
        .then((response) => {
            is_submit.value = true;
            result.value = response.data;
        })
        .catch((error) => {
            toast.add({
                severity: "error",
                summary: error.response.data.message,
                life: 3000,
            });
        });
};
const getProduct = () => {
    axios.get("/api/products").then((response) => {
        products.value = response.data;
    });
};
getProduct();
</script>
<style scoped>
.table {
    width: 100%;
    border-collapse: collapse;
    border-left: 1px solid #52525b;
    border-bottom: 1px solid #52525b;
}
.table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #52525b;
    border-right: 1px solid #52525b;
}
</style>