using UnityEngine;
using System.Collections.Generic;

namespace NDIGame
{

    public class GameManager : Singleton<GameManager>
    {

        [SerializeField] private Wave[] waves;
        [SerializeField] private Waypoint spawnPoint;
        [SerializeField] private float waveSpawnDelay = 1.5f;
        [SerializeField] private float waveDelay = 3f;
        [SerializeField] private int health;

        [SerializeField] private int money;

        private List<Enemy> enemies;

        private float waveStartTimer;
        private bool waveRunning;

        private int currentWave;

        public Waypoint SpawnPoint => spawnPoint;
        public List<Enemy> Enemies => enemies;
        public int Money => money;

        protected override void OnSingletonLoad()
        {
            enemies = new List<Enemy>();
        }

        private void Start()
        {
            waveStartTimer = waveDelay;
        }

        private void Update()
        {
            if(currentWave == waves.Length)
            {
                return;
            }

            if(!waveRunning)
            {
                if(waveStartTimer <= 0f)
                {
                    waveRunning = true;
                    return;
                }
                waveStartTimer -= Time.deltaTime;
                return;
            }

            if(waves[currentWave].EnemiesLeft != 0)
            {
                if(waveStartTimer <= 0f)
                {
                    Instantiate(waves[currentWave].GetRandomEnemy(), spawnPoint.transform.position, Quaternion.identity);
                    waveStartTimer = UnityEngine.Random.Range(0.5f, waveSpawnDelay);
                    return;
                }
                waveStartTimer -= Time.deltaTime;
            }

            if(waves[currentWave].EnemiesLeft == 0 && enemies.Count == 0)
            {
                waveStartTimer = waveDelay;
                waveRunning = false;
                currentWave++;
            }

        }

        public void Damage(int damage)
        {
            health -= damage;
            Debug.Log("HP left: " + health);
            if(health <= 0)
            {
                Debug.Log("Game Over");
            }

        }

        public void AddEnemy(Enemy enemy)
        {
            enemies.Add(enemy);
        }

        public void RemoveEnemy(Enemy enemy)
        {
            enemies.Remove(enemy);
        }

        public bool CheckMoney(int price)
        {
            return money >= price;
        }

        public void AddMoney(int price)
        {
            money += price;
            UIManager.Instance.UpdateMoney(money);
        }

    }

}