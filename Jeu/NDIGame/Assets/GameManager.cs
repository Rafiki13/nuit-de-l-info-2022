using UnityEngine;
using System.Collections.Generic;

namespace NDIGame
{

    public class GameManager : Singleton<GameManager>
    {

        [SerializeField] private int health;

        [SerializeField] private Waypoint spawnPoint;

        public Waypoint SpawnPoint => spawnPoint;

        private List<Enemy> enemies;

        public List<Enemy> Enemies => enemies;

        private void Awake()
        {
            enemies = new List<Enemy>();
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

    }

}