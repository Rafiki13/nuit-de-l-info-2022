using UnityEngine;

namespace NDIGame
{

    public class GameManager : Singleton<GameManager>
    {

        [SerializeField] private int health;

        [SerializeField] private Waypoint spawnPoint;

        public Waypoint SpawnPoint => spawnPoint;

        public void Damage(int damage)
        {
            health -= damage;
            Debug.Log("HP left: " + health);
            if(health <= 0)
            {
                Debug.Log("Game Over");
            }
        }

    }

}