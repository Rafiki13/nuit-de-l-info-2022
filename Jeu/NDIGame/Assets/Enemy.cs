using UnityEngine;

namespace NDIGame
{
    public class Enemy : MonoBehaviour
    {
        [SerializeField] private int life;
        [SerializeField] private int speed;
        [SerializeField] private int aR;
        [SerializeField] private int mR;
        [SerializeField] private int dmgT;

        private Vector2 startPos;
        private Vector2 endPos;

        private float maxDistance;
        private float distance;

        private int waypoint;

        void Start()
        {
            transform.position = ;
        }
        
        void Update()
        {
            transform.position = Vector2.Lerp(, endingPoint, distance / maxDistance);
            distance += speed * Time.deltaTime;
            //Genre position += vitesse * Time.deltaTime
        }

    }

}

