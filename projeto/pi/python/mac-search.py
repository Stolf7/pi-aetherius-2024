import nmap

def scan_network(network):
    scanner = nmap.PortScanner()
    scanner.scan(hosts=network, arguments='-sn')
    hosts_list = [(x, scanner[x]['status']['state']) for x in scanner.all_hosts()]
    return hosts_list

def main():
    network = '192.168.2.0/24'  # Define a rede a ser escaneada
    print(f"Escaneando a rede {network} em busca de hosts ativos...")
    hosts = scan_network(network)
    print("Hosts ativos na rede:")
    for host, status in hosts:
        if status == 'up':
            print(f"Host: {host} está {status}")

if __name__ == "__main__":
    main()
