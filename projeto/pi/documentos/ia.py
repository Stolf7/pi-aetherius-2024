import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
from sklearn.linear_model import LogisticRegression
from sklearn.tree import DecisionTreeClassifier
from sklearn.metrics import accuracy_score
from sklearn.model_selection import train_test_split
import joblib  # Para salvar e carregar modelos

# Função para verificar riscos
def verificar_risco(co2, co, no2):
    limiar_co2 = 1000  # Limiar de CO2 preocupante
    limiar_co = 50     # Limiar de CO preocupante
    limiar_no2 = 20    # Limiar de NO2 preocupante

    if co2 > limiar_co2 or co > limiar_co or no2 > limiar_no2:
        print("Risco detectado! Níveis de CO2, CO ou NO2 estão preocupantes.")
    else:
        print("Nenhum risco detectado.")

# Criando um DataFrame de exemplo com valores de CO2, CO, NO2 e risco
data = {
    'CO2': [800, 1200, 600, 1000, 700],
    'CO': [30, 40, 20, 35, 25],
    'NO2': [15, 18, 12, 20, 10],
    'risco': ['baixo', 'alto', 'baixo', 'alto', 'baixo']
}

df = pd.DataFrame(data)

# Dividir os dados em features (X) e variável alvo (y)
X = df[['CO2', 'CO', 'NO2']]  # Features
y = df['risco']  # Target variable

# Dividir os dados em conjuntos de treinamento e teste
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Treinamento do modelo de Regressão Logística
lr_model = LogisticRegression(solver='liblinear')
lr_model.fit(X_train, y_train)
lr_accuracy = accuracy_score(y_test, lr_model.predict(X_test))
print("Acuracidade da Regressão Logística:", lr_accuracy)

# Salvando o modelo de Regressão Logística em disco
joblib.dump(lr_model, 'lr_model.pkl')

# Treinamento do modelo de Árvore de Decisão
tree_model = DecisionTreeClassifier(max_depth=3, criterion="entropy")
tree_model.fit(X_train, y_train)
tree_accuracy = accuracy_score(y_test, tree_model.predict(X_test))
print("Acuracidade da Árvore de Decisão:", tree_accuracy)

# Salvando o modelo de Árvore de Decisão em disco
joblib.dump(tree_model, 'tree_model.pkl')

# Teste da função verificar_risco
co2 = 8000
co = 30
no2 = 15

def verificar_risco(co2, co, no2):
    limiar_co2 = 1000  # Limiar de CO2 preocupante
    limiar_co = 50     # Limiar de CO preocupante
    limiar_no2 = 20    # Limiar de NO2 preocupante

    gases_preocupantes = []

    if co2 > limiar_co2:
        gases_preocupantes.append("CO2")
    if co > limiar_co:
        gases_preocupantes.append("CO")
    if no2 > limiar_no2:
        gases_preocupantes.append("NO2")

    if gases_preocupantes:
        print("Risco detectado! Níveis de", ", ".join(gases_preocupantes), "estão preocupantes.")
    else:
        print("Nenhum risco detectado.")


verificar_risco(co2, co, no2)  # Exibirá "Risco detectado! Níveis de CO2, CO ou NO2 estão preocupantes."

# Carregando o modelo de Regressão Logística treinado
loaded_lr_model = joblib.load('lr_model.pkl')

# Testando o modelo carregado
print("Teste do modelo de Regressão Logística carregado:", loaded_lr_model.predict([[800, 30, 15]]))

# Carregando o modelo de Árvore de Decisão treinado
loaded_tree_model = joblib.load('tree_model.pkl')

# Testando o modelo carregado
print("Teste do modelo de Árvore de Decisão carregado:", loaded_tree_model.predict([[800, 30, 15]]))
