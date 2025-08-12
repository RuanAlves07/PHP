from selenium import webdriver
from selenium.webdriver.common.by import By 
import time

service = webdriver.ChromeService(executable_path="C:/Users/ruan_a_alves/Downloads/chrome-win64.exe")
driver = webdriver.Chrome(service=service)

try:

    driver.get("selenium-php-project")

    campo_nome = driver.find_element(By.ID, "nome")
    campo_descricao = driver.find_element(By.ID, "descricao")
    campo_categoria = driver.find_element(By.ID, "categoria")
    campo_quantidade = driver.find_element(By.ID, "quantidade")
    campo_preco = driver.find_element(By.ID, "preco")
    campo_fornecedor = driver.find_element(By.ID, "fornecedor")
    botao_adicionar = driver.find_element(By.ID, "enviar")

    campo_nome.send_keys("Laptop Gamer")
    campo_quantidade.send_keys("5")
    campo_preco.send_keys("7500.00")

    botao_adicionar.click()
    time.sleep(2)

    tabela = driver.find_element(By.ID, "id-da-tabela")

    if "Laptop Gamer" in tabela.text and "5" in tabela.text and "7500.00" in tabela.text:
        print("💚 Teste de cadastro de produto: SUCESSO")
    else:
        print("❤️ Teste de cadastro de produto: FALHA!")
finally:

    driver.quit()